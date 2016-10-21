<?php

	namespace FriendlySold\Controller;

	use Silex\Application;


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

        public function getGroups($id, Application $app  ){
            try{
                $users = $app['GroupDAO']->find($id);
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
    }

