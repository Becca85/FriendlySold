<?php
namespace Friendly\Controller;
use Silex\Apllication;
use Symfony\Component\HttpFoundation\Request;
use Friendly\Domain\User;

class ApiController {
	public function login($id, $username, $password Application $app){
        //TODO
        return $app->json(array(
				'records' => $result,
                'status' => 'OK'
			), 200);
    }
    public function logout($id, Application $app){
        //TODO
        return $app->json(array(
				'records' => $result,
                'status' => 'OK'
			), 200);
    }
}
