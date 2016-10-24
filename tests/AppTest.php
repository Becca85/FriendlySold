<?php
namespace FriendlySold\test;
require_once __DIR__.'../../vendor/autoload.php';
use Silex\WebTestCase;
use FriendlySold\DAO\UserDAO;
use FriendlySold\DAO\GroupDAO;
use FriendlySold\Domain\User;
use FriendlySold\Domain\Group;

class AppTest Extends WebTestCase{
    private $db;

    public function testUserFindAll(){
        $dao = new UserDAO($this->db);
        $result = $dao->findAll();
        var_dump($result);
        $this->assertTrue(count($result) <=15);
    }

    public function testUserFindByGroup(){
        $dao = new UserDAO($this->db);
        $result = $dao->findByGroup(1);
        var_dump($result);
        $this->assertTrue(count($result) == 1);

    }



    public function testUserFind(){
        $dao = new UserDAO($this->db);
        $result = $dao->find(1);
        echo "testUserFind";
        var_dump($result);
        $this->assertTrue(count($result) == 1);
    }


    public function testUserGetColorName(){
        $dao = new UserDAO($this->db);
        $result = $dao->getColorName(2);
        echo "testUserGetColorName";
        var_dump($result);
        $this->assertTrue(count($result) == 1);
    }

    //Update test (function save)
    /*public function testUserSaveUpdate(){
        $dao = new UserDAO($this->db);
        $user = new user;
        $user->setId(1);
        $user->setUsername("toto");
        $user->setGroup(1);
        $user->setColor("red");
        $result = $dao->save($user);
        echo "Test User Save Update:\n";
        var_dump($result);
        $this->assertTrue(count($result) == 1);
    }*/

    //Create test (function save)
    /*public function testUserSaveCreate(){
        $dao = new UserDAO($this->db);
        $user = new user;
        $user->setUsername("mopi");
        $user->setGroup(2);
        $user->setColor("green");
        $result = $dao->save($user);
        echo "Test User Save Create:\n";

        var_dump($result);
        $this->assertTrue(count($result) == 1);
    }*/



    /**
     * {@inheritDoc}
     */
    public function createApplication()
    {
        $app = new \Silex\Application();
        
require __DIR__.'/../app/config/dev.php';
        $app->register(new \Silex\Provider\DoctrineServiceProvider());
        $this->db = $app['db'];
        return $app;
    }

    public function testlogin(){
                $dao = new GroupDAO($this->db);
                $result = $dao->login('mongroupe1', 'pass1');     
                echo "test de login";
                $temp_key = "SELECT gro_temp_key FROM t_groupe WHERE gro_name = $name";
                $this->assertTrue(strlen($temp_key) == 3);
                /*$this->assertTrue($temp_key == $key);*/


             



    }


}
