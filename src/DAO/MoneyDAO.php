<?php


namespace FriendlySold\DAO;


use FriendlySold\Domain\Money;


class MoneyDAO extends DAO

{

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
        } else {
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
        if ($id == null){
             throw new \Exception("id null ");
        } else {

        // Delete the article
        $this->getDb()->delete('t_money', array('mon_id' => $id));
    }
    }


     /**

     * Returns an article matching the supplied id.

     *

     * @param integer $id

     *

     * @return \MicroCMS\Domain\Article|throws an exception if no matching article is found

     */

    public function find($id) {
        if ($id == null){
             throw new \Exception("id null ");
        } else {
        $db = "select * from t_money where mon_id=?";

        $row = $this->getDb()->fetchAssoc($db, array($id));


        if ($row)

            return $this->buildDomainObject($row);

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

        $sql = "select * from t_money order by mon_id";

        $result = $this->getDb()->fetchAll($sql);


        // Convert query result to an array of domain objects

        $articles = array();

        foreach ($result as $row) {

            $articleId = $row['mon_id'];

            $articles[$articleId] = $this->buildDomainObject($row);

        }

        return $articles;

    }


    /**

     * Creates an Article object based on a DB row.

     *

     * @param array $row The DB row containing Article data.

     * @return \MicroCMS\Domain\Article

     */

    protected function buildDomainObject($row) {

        $MoneyDAO = new Money();

        $MoneyDAO->getId($row['mon_id']);

        $MoneyDAO->getMontant($row['mon_montant']);

        $MoneyDAO->getIdPayeur($row['mon_id_payeur']);

        $MoneyDAO->getDate($row['mon_date']);

        $MoneyDAO->getGroup($row['mon_id_groupe']);

        $MoneyDAO->getDescription($row['mon_description']);

        return $MoneyDAO;

    }

}
