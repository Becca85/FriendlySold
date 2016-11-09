<?php

namespace FriendlySold\Controller;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use FriendlySold\Domain\User;
use FriendlySold\Domain\Group;
use FriendlySold\Domain\Money;
	


	class APIControllerRead {

		public function getUsers($id, Application $app) {
			try{
                $user = $app['UserDAO']->find($id);
            //$reponse = this->buildUserArray($user);
            return $app->json($user);
            }catch(\Exception $e){
                return $app->json(array(
                    'records' => [],
                    'status' => 'KO',
                    'error' => $e->getMessage()
                ), 200);

            }
        }

        public function getMoney($id, Application $app  ){
            try{
                $users = $app['MoneyDAO']->find($id);
            }catch(\Exception $e){
                return $app->json(array(
                    'records' => [],
                    'status' => 'KO',
                    'error' => $e->getMessage()
                ), 400);

            }

			return $app->json(array(
				'records' => $result,
                'status' => 'OK'
			), 200);
        }

        public function getGroups($group_id, Application $app  ){
            try {
                $key = $app['GroupDAO']->find($group_id);
            } catch(Exception $e){
                return $app->json(array(
                    'records' => [],
                    'status' => 'KO',
                    'error' => $e->getMessage()
                ), 400);

            }

			return $app->json(array(
				'records' => $result,
                'status' => 'OK'
			), 200);
        }

        private function buildUserArray(array $user) {
       $data = array(
           'id' => $user->getId(),
           'username' => $user->getUserName(),
           'usergroup' => $group->getGroup(),
           'usercolor' => $user->getColor()
           );
       return $data;
   }
    }

