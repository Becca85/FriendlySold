<?php

	namespace FriendlySold\Controller;

	use Silex\Application;


	class APIControllerRead {

		public function getUsers($id, Application $app) {
			$users = $app['UserDAO']->find($id);
			return $app->json(array(
				'records' => $result,
                'status' => 'OK'
			), 200);
		}
        public function getMoney($id, Application $app  ){
            $users = $app['MoneyDAO']->find($id);
			return $app->json(array(
				'records' => $result,
                'status' => 'OK'
			), 200);
        }
        public function getGroups($id, Application $app  ){
            $users = $app['GroupDAO']->find($id);
			return $app->json(array(
				'records' => $result,
                'status' => 'OK'
			), 200);
        }

    }
