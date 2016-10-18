<?php


namespace FriendlySold\DAO;


use FriendlySold\Domain\User;


class UserDAO extends DAO 
{
	public function findAll(){
		$db= "SELECT * FROM t_user order by usr_id_groupe";
		$result =  $this->getDb()->fetchAll($db);
		//Convertir en tableau, l'objet que l'on recupère de la base de donnée
		$tableau_db=array();
		foreach ($result as $row) {
			$id = $row['usr_id'];
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
        $db = "select * from t_user where usr_id=?";
        $row = $this->getDb()->fetchAssoc($db, array($id));
        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No user matching id " . $id);

    }

    public function getColorName($id){
        //TODO
    }

    public function save(User,$user){
         $userData = array(
            'usr_name' => $user->getUsername(),
            'usr_salt' => $user->getSalt(),
            'usr_password' => $user->getPassword(),
            'usr_role' => $user->getRole()
            );
        if ($user->getId()) {
            // The user has already been saved : update it
            $this->getDb()->update('t_user', $userData, array('usr_id' => $user->getId()));
        } else {
            // The user has never been saved : insert it
            $this->getDb()->insert('t_user', $userData);
            // Get the id of the newly created user and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $user->setId($id);
        }
    }

    public function delete($id){
        //TODO
    }

   /**

     * Creates a User object based on a DB row.

     *

     * @param array $row The DB row containing User data.

     * @return \FriendlySold\Domain\User

     */

    protected function buildDomainObject($row) {

        $article = new User();

   /*     $article->setId($row['art_id']);

        $article->setTitle($row['art_title']);

        $article->setContent($row['art_content']);
*/
        return $article;

    }
}
