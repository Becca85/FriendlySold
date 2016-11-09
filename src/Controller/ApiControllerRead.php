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
                $users = $app['UserDAO']->find($id);
            }catch(Exception $e){
                return $app->json(array(
                    'records' => [],
                    'status' => 'KO',
                    'error' => $e->getMessage()
                ), 200);

            }

			return $app->json(array(
				'records' => $result,
                'status' => 'OK'
			), 200);
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
    }

