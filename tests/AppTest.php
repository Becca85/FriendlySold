<?php
namespace FriendlySold\test;
require_once __DIR__.'../../vendor/autoload.php';
use Silex\WebTestCase;
use FriendlySold\DAO\UserDAO;

class AppTest Extends WebTestCase{
	private $db;

	public function testUserFindAll(){
	    $dao = new UserDAO($this->db);
	    $result = $dao->findAll();
	    $this->assertTrue(count($result) == 3);
    }


    /**
     * {@inheritDoc}
     */
    public function createApplication()
    {
        $app = new \Silex\Application();
        $app->register(new Silex\Provider\DoctrineServiceProvider());
        $this->db = $app['db'];
        return $app;
    }


}