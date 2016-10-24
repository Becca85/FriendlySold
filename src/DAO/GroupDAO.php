<?php

namespace FriendlySold\DAO;



use FriendlySold\Domain\Group;


class GroupDAO extends DAO
{
	public function findAll(){

        $db= "SELECT * FROM t_groupe order by gro_id";
		$result =  $this->getDb()->fetchAll($db);
		//Convertir en tableau, l'objet que l'on recupère de la base de donnée
		$tableau_db=array();
		foreach ($result as $row) {
			$id = $row['gro_name'];
			$tableau_db[$id] = $this->buildDomainObject($row);
		}
		return $tableau_db;
	}


    public function findByGroup($group){


        $db="SELECT * FROM t_user WHERE usr_id_groupe='$group'";
        $result = $this->getDb()->fetchAll($db);

        $tableau_db=array();
        foreach ($result as $row) {
            $id = $row['usr_id_groupe'];
            $di = $row['usr_name'];
            $tableau_db[$id+$di] = $this -> buildDomainObject($row);
        }
        return $tableau_db;
    }


    public function find($id){
        if ($id == null) {
             throw new \Exception("id null ");
        } else {

        $db = "SELECT * FROM t_groupe WHERE gro_id='$id'";
        $row = $this->getDb()->fetchAssoc($db, array($id));
        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No group matching id " . $id . ".");

    }
    }

    /* public function save(Group , $groupe){
         $groupeData = array(
            'gro_name' => $groupe->groupname(),
            'gro_id' => $groupe->getId(),
            'gro_password' => $groupe->getPassword()


            );
        if ($groupe->getId()) {
            // The user has already been saved : update it
            $this->getDb()->update('t_group', $groupeData, array('usr_id' => $groupe->getId()));
        } else {
            // The user has never been saved : insert it
            $this->getDb()->insert('t_group', $groupeData);
            // Get the id of the newly created user and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $group->setId($id);
        }
    }*/

    public function delete($id){
        if ($id = null){
             throw new \Exception("id null ");
        } else {


    
      $this->getDb()->delete('t_group', array('gro_id' => $id));
                //pour verifier les user ressgtant apres suppression


        

    }
    }

        public function login($name, $password){
            //TODO a tester
            $toto = false ;
            $relatedGroups = $this->getDb()->select('t_group', array('gro_name' => $name));
            /*TODO faire peter une exeption*/
            var_dump($relatedGroups);
            if ($password == $relatedGroups[0]['gro_password'] ) {
                $toto = true ;
                if($toto == true){
                    $key = rand(100, 999);
                    var_dump($this->db);
                    //$relatedGroups[0]['gro_id']
                    $db = "UPDATE `t_groupe` SET gro_temp_key = $key WHERE gro_id = :id";
                    $this->getDb()->prepare($db);
                    $this->getDb()->execute(array('id' => $relatedGroups[0]['gro_id']));

                    return $app->json(array(
                        'record'=> $key ,
                        'status'=> 'ok' ,
                        'error'=> $e-> getMessage()


                        ), 200);




                }
            } else {
                 throw new \Exception("invalid group or password!");
            }

        
        }

        public function logout(Request $request, Application $app, $key) {
                //TODO session destroy 
                    $temp = $this->getDb()->select('t_group', array('gro_temp_key' => $key))
                    if ($key == null){
                    throw new \Exception("vous n'etes pas connecté");
                    } else {
                    $relatedGroups = $this->getDb()->select('t_group', array('gro_temp_key' => $key));
                     $db = "UPDATE `t_groupe` SET gro_temp_key = 0 WHERE gro_id = :id";
                    $this->getDb()->prepare($db);
                    $this->getDb()->execute(array('id' => $relatedGroups[0]['gro_id']));

                    echo 'vous etes deconneté';
                    //pour verifier les user restant apres suppression

                    }

        } 



    protected function buildDomainObject($row) {

        $groupe = new Group();

        $groupe->getGroupname($row['gro_id']);

        $groupe->getGroup($row['gro_name']);

        $groupe->getPassword($row['gro_password']);

        $groupe->getKey($row['gro_temp_key']);

        return $groupe;

    }
}
