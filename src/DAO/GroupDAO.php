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
	
	
	public function find($id){
		if ($id == null) {
			throw new \Exception("id null ");
		}
		else {
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


	public function delete($id) {
		if ($this->find($id))
			$this->getDb()->delete('t_groupe', array('gro_id' => $id));
	}
	
	/*syntax des parametres a donné a rest*/
	/* 
	{
	"groupname" : "mongroupe1",
	"password" : "pass1"
	}
	*/

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
		else {
			
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
		
		// print_r($recordkeyreq);                
		if (count($recordkeyreq)!=0) {
			$db = "UPDATE t_groupe SET gro_temp_key = 0 WHERE gro_name = :gro_name";
			$query = $this->getDb()->prepare($db);
			$query->execute(array(
				'gro_name' => $data['groupname']));
			echo $key;
		} 
		else {
			//echo ('You are not connected !');
			throw new Exception("un probleme est survenue");
		}
	}

	/*logout old with juliette*/

	/* $temp = $this->getDb()->select('t_group', array('gro_temp_key' => $key));
	if ($key == null){
	throw new \Exception("vous n'etes pas connecté");
	} else {
	$relatedGroups = $this->getDb()->select('t_group', array('gro_temp_key' => $key));
	$db = "UPDATE `t_groupe` SET gro_temp_key = 0 WHERE gro_id = :id";
	$this->getDb()->prepare($db);
	$this->getDb()->execute(array('id' => $relatedGroups[0]['gro_id']));

  echo 'vous etes deconneté';*/
  //pour verifier les user restant apres suppression

	protected function buildDomainObject($row) {
			$groupe = new Group();
			$groupe->getGroup($row['gro_id']);
			$groupe->getGroupname($row['gro_name']);
			$groupe->getPassword($row['gro_password']);
			$groupe->getKey($row['gro_temp_key']);
			return $groupe;
		}
	}