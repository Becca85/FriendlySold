<?php
namespace FriendlySold\DAO;
use FriendlySold\Domain\Money;

class MoneyDAO extends DAO {
	
	/**
	* Saves an article into the database.
	*
	* @param \MicroCMS\Domain\Article $article The article to save
	*/
	/* public function save(Article , $article) {
		$articleData = array(
			'art_title' => $article->getTitle(),
			'art_content' => $article->getContent(),
		);
		if ($article->getId()) {
			// The article has already been saved : update it
			$this->getDb()->update('t_article', $articleData, array('art_id' => $article->getId()));
		}
		else {
			// The article has never been saved : insert it
			$this->getDb()->insert('t_article', $articleData);
			// Get the id of the newly created article and set it on the entity.
			$id = $this->getDb()->lastInsertId();
			$article->setId($id);
		}
	} */

	/**
	* Removes an article from the database.
	*
	* @param integer $id The article id.
	*/
	public function delete($id) {
		if ($this->find($id))
			$this->getDb()->delete('t_money', array('mon_id' => $id));
	}

     /**

     * Returns an article matching the supplied id.

     *

     * @param integer $id

     *

     * @return \MicroCMS\Domain\Article|throws an exception if no matching article is found

     */

	public function find($id) {
		if ($id == null)
			throw new \Exception("id null ");
		else {
			$sql = "SELECT * FROM t_money WHERE mon_id=:id";
            $dbh = $this->getDb()->prepare($sql);
            $dbh->execute(array('id'=>$id));
			$result = $dbh->fetchAll();
			if (count($result)>0){
                $mon = $this->buildDomainObject($result[0]);
				return $mon;
            }
			else
				throw new \Exception("No money matching id " . $id);
    	}
    }
	
	/**
	* Return a list of all articles, sorted by date (most recent first).
	*
	* @return array A list of all articles.
	*/
	public function findAll() {
		$sql = "SELECT * FROM t_money ORDER BY mon_id";
		$result = $this->getDb()->fetchAll($sql);
		// Convert query result to an array of domain objects
		$articles = array();
		foreach ($result as $row) {
			$articleId = $row['mon_id'];
			$articles[$articleId] = $this->buildDomainObject($row);
		}
		return $articles;
	}

    public function save(Money $money){
               
        // if my id exist, I update my money table
        if (!is_null($money->getId())){
      
            echo "update:\n";
            $update = "UPDATE t_money SET mon_montant=:moneymontant,mon_id_payeur=:moneyidpayeur,mon_date=:moneydate, mon_id_groupe=:moneyidgroupe, mon_description=:moneydescription WHERE mon_id=:moneyid";
            $query = $this->getDb()->prepare($update);

            $query->bindValue(':moneyid', $money->getId());
            $query->bindValue(':moneymontant', $money->getMontant());
            $query->bindValue(':moneyidpayeur', $money->getIdPayeur());
            $query->bindValue(':moneydate', $money->getDate());
            $query->bindValue(':moneyidgroupe', $money->getGroup());
            $query->bindValue(':moneydescription', $money->getDescription());
          
            $query->execute();

            if($query->errorCode() != "00000");
                var_dump($query->errorInfo());
            return $money;
        }


        // If not, I create a new money
         else { 
            echo "create:\n";
            $create = "INSERT INTO t_money(mon_montant, mon_id_payeur, mon_date, mon_id_groupe, mon_description) VALUES (:moneymontant,:moneyidpayeur,:moneydate,:moneyidgroupe,:moneydescription)";
            $query = $this->getDb()->prepare($create);

            
            $query->bindValue(':moneymontant', $money->getMontant());
            $query->bindValue(':moneyidpayeur', $money->getIdPayeur());
            $query->bindValue(':moneydate', $money->getDate());
            $query->bindValue(':moneyidgroupe', $money->getGroup());
            $query->bindValue(':moneydescription', $money->getDescription());
            
            $query->execute();

            $money->setId($this->getDb()->lastInsertId());
            var_dump($money);
            return $money;
        } 
  
    }

    /**

     * Creates an Article object based on a DB row.

     *

     * @param array $row The DB row containing Article data.

     * @return \MicroCMS\Domain\Article

     */

    protected function buildDomainObject($row) {

        $MoneyDAO = new Money();

        $MoneyDAO->setId($row['mon_id']);

        $MoneyDAO->setMontant($row['mon_montant']);

        $MoneyDAO->setIdPayeur($row['mon_id_payeur']);

        $MoneyDAO->setDate($row['mon_date']);

        $MoneyDAO->setGroup($row['mon_id_groupe']);

        $MoneyDAO->setDescription($row['mon_description']);

        return $MoneyDAO;

    }

    public function toJSONStructure(Money $money){
        $jsonResult=[];

        $jsonResult["Id"] = $money->getId();
        $jsonResult["montant"] = $money->getMontant();
        $jsonResult["payeur"] = $money->getIdPayeur();
        $jsonResult["date"] = $money->getDate();
        $jsonResult["groupe"] = $money->getGroup();
        $jsonResult["description"] = $money->getDescription();

        return $jsonResult;
                
    }

}
