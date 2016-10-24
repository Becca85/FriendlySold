<?php


namespace FriendlySold\DAO;


use FriendlySold\Domain\group;


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

    public function save(Group $group){
               
        // if my id exist, I update my group table
        if (!is_null($group->getId())){
      
            echo "update:\n";
            $update = "UPDATE t_groupe SET gro_name=:groupname,gro_password=:grouppassword WHERE gro_id=:groupid";
            $query = $this->getDb()->prepare($update);

            $query->bindValue(':groupid', $group->getId());
            $query->bindValue(':groupname', $group->getGroupname());
            $query->bindValue(':grouppassword', $group->getPassword());
          
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


    public function delete($id){
        if ($id = null){
             throw new \Exception("id null ");
        } else {


    
      $this->getDb()->delete('t_groupe', array('gro_id' => $id));
                //pour verifier les user ressgtant apres suppression


        

    }
    }



    protected function buildDomainObject($row) {

        $groupe = new Group();

        $groupe->groupname($row['gro_id']);

        $groupe->getGroup($row['gro_name']);

        $groupe->getPassword($row['gro_password']);

        return $groupe;

    }
}
