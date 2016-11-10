<?php

namespace FriendlySold\DAO;



use FriendlySold\Domain\Group;


class GroupDAO extends DAO {
	
	public function findAll() {
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


   public function find($id) {
               if ($id == null)
            throw new \Exception("id null ");
                else {
            $sql = "SELECT * FROM t_groupe WHERE gro_id=:id";
            $dbh = $this->getDb()->prepare($sql);
            $dbh->execute(array('id'=>$id));
            $result = $dbh->fetchAll();
            
            if (count($result)>0){
            
                $gro = $this->buildDomainObject($result[0]);
                return $gro;
                
            }
            
            else
                throw new \Exception("No user matching id " . $id);
        }

    }

   


    public function delete($id){
        if ($id = null){
             throw new \Exception("id inexistant ");
        } else {


    
      $this->getDb()->delete('t_groupe', array('gro_id' => $id));
                //pour verifier les user exisstant apres suppression

  }

}

	public function save(Group $group){
		
		// if my id exist, I update my group table
		if (!is_null($group->getId())){
			
			echo "update:\n";
			$update = "UPDATE t_groupe SET gro_name=:groupname,gro_password=:grouppassword,gro_temp_key=:key WHERE gro_id=:groupid";
			$query = $this->getDb()->prepare($update);
			
			$query->bindValue(':groupid', $group->getId());
			$query->bindValue(':groupname', $group->getGroupname());
			$query->bindValue(':grouppassword', $group->getPassword());
			$query->bindValue(':key', $group->getKey());
			
			$query->execute();
			
			if($query->errorCode() != "00000");
			var_dump($query->errorInfo());
			return $group;
		}
		
		// If not, I create a new group
		else { 
			echo "create:\n";
			$create = "INSERT INTO t_groupe(gro_name, gro_password) VALUES (:groupname,:grouppassword)";
			$query = $this->getDb()->prepare($create);
			
			$query->bindValue(':groupname', $group->getGroupname());
			$query->bindValue(':grouppassword', $group->getPassword());
			
			$query->execute();
			
			$group->setId($this->getDb()->lastInsertId());
			var_dump($group);
			return $group;
		}
	}


	

    /*login start*/


    public function login($request){

        
        $data = json_decode($request->getContent(), true);
        var_dump($data);

        
        $relatedGroups = "SELECT * FROM t_groupe WHERE gro_name =:groupname AND gro_password =:password;";
        
        $query = $this->getDb()->prepare($relatedGroups);
        $query->execute(array(
            'groupname' => $data['groupname'],
            'password' => $data['password']));
        $record = $query->fetchAll();

        print_r($record)  ; 

        if(count($record) < 1){

            throw new \Exception("The parameters given is invalid", 1);
        } 
        else if($record == null){


            throw new \Exception("The parameters given is invalid", 1);


        } else {

            $login = 'vous etes connecté';
            echo $login ;
                   
            /*ajout de la clé de login*/
            $key = rand(100, 999);
            $db = "UPDATE `t_groupe` SET gro_temp_key = $key WHERE gro_name = :groupname";
            $query = $this->getDb()->prepare($db);
            $query->execute(array( 'groupname' => $data['groupname']));
            return $key;

         }

        
        
         /*var_dump($query->fetchAll());*/
    }

       /*login end */



        /*logout start*/
        

        public function logout($request) {
                
            $data = json_decode($request->getContent(), true);

            $recordkey = "SELECT gro_temp_key FROM t_groupe WHERE gro_name = :groupname";
            $query = $this->getDb()->prepare($recordkey);
            $query->execute(array(
            'groupname' => $data['groupname']));
            $recordkeyreq = $query->fetchAll();
             
                         

            if (count($recordkeyreq)!=0){

                
                $db = "UPDATE t_groupe SET gro_temp_key = 0 WHERE gro_name = :gro_name";
                $query = $this->getDb()->prepare($db);
                $query->execute(array(
                    'gro_name' => $data['groupname']));
                echo $key;
            } 

            else{

                //echo ('You are not connected !');

                throw new Exception("un probleme est survenue");

            }

        }





    protected function buildDomainObject($row) {

        $groupe = new Group();

        $groupe->setId($row['gro_id']);

        $groupe->setGroupname($row['gro_name']);

        $groupe->setPassword($row['gro_password']);

        $groupe->setKey($row['gro_temp_key']);

        return $groupe;

    }

    public function toJSONStructure(Array $group){
        $jsonResult=[];
        foreach ($group as $key => $group) {
            $jsonResult[$key] = [];
            $jsonResult[$key]["Id"] = $group->getId();
            $jsonResult[$key]["name"] = $group->getGroupname();
            $jsonResult[$key]["password"] = $group->getPassword();
            $jsonResult[$key]["key"] = $group->getKey();
        }


        return $jsonResult;
                
    }
}


	 