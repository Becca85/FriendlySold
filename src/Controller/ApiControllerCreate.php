<?php

namespace FriendlySold\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use FriendlySold\Domain\User;
//cd /enchant_dict_check(dict, word);

Class APIControllerCreate {


	public function addUser(Request $request, Application $app){

		try{
                $user = new User;
                echo "hello!!!!!!!";


                // methode pour récupérer et decoder le format json
                $data = json_decode($request->getContent(), true);
                 var_dump($data);
                $request->request->replace(is_array($data) ? $data : array());

                var_dump($request->request);

                if ($request->request->has('username') && $request->request->has('usergroup') && $request->request->has('usercolor')) {
                if ($request->request->has('Id')) 
                    $user->setId($request->request->get('Id'));
                $user->setUsername($request->request->get('username'));
                $user->setGroup($request->request->get('usergroup'));
                $user->setColor($request->request->get('usercolor'));
                }
                else {
                    return $app->json(array(
                    'records' => [],
                    'status' => 'KO',
                    'error' => 'error',
                    ), 400);
                }

                //TODO
                $users = $app['UserDAO']->save($user);
                $result = array(
                	"id"=>$user->getId(),
                	"username"=> $user->getUsername()
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
                ), 400);
        
	}

    /*public function addMoney($id, Application $app  ){
            throw new \Exception("TODO");
        }
    public function addGroup($id, Application $app  ){
            throw new \Exception("TODO");
        }*/

}
}
