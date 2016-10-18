<?php


namespace FriendlySold\DAO;


use FriendlySold\Domain\User;


class UserDAO extends DAO 
{
	public function findAll(){
		$db= "SELECT * t_user order by usr_id_groupe";
		$result =  $this->getDb()->fetchAll($db);
		//Convertir en tableau, l'objet que l'on recupère de la base de donnée
		$tableau_db=array();
		foreach ($result as $row) {
			$id = $row['usr_id'];
			$tableau_db[$id] = $this->buildDomainObject($row);
		}
		return $tableau_db;
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