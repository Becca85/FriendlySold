<?php


namespace FriendlySold\DAO;


use FriendlySold\Domain\User;


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
        if ($id = null){
             throw new \Exception("id null ");
        } else {

        $db = "select * from t_groupe where gro_id=?";
        $row = $this->getDb()->fetchAssoc($db, array($id));
        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No group matching id " . $id);

    }
    }

    public function save(Group,$groupe){
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



    protected function buildDomainObject($row) {

        $article = new GroupDAO();

        $article->groupname($row['gro_id']);

        $article->getGroup($row['gro_name']);

        $article->getPassword($row['gro_password']);

        return $article;

    }
}
