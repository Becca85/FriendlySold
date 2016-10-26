<?php

namespace FriendlySold\Controller;

Class ApiControllerCreate {


	public function addUser($id, Application $app){

		try{
                $users = $app['UserDAO']->add($id);
                $result = array(
                	"id":$user->getId();
                	"username": $user->get
                	);
                return $app->json(array(
				'records' => $result,
                'status' => 'OK'
				), 200);
            }

        catch(Exception $e){
                return $app->json(array(
                    'records' => [],
                    'status' => 'KO',
                    'error' => $e->getMessage()
                ), 200);
        
	}

    /*public function addMoney($id, Application $app  ){
            throw new \Exception("TODO");
        }
    public function addGroup($id, Application $app  ){
            throw new \Exception("TODO");
        }*/

}
