<?php
namespace Friendly\Controller;
use Silex\Apllication;
use Symfony\Component\HttpFoundation\Request;
use FriendlySold\Domain\User;

class ApiController {
$
	/**
	*API
	*/
}





/*note exemple*/


/*return $app->json(array('records'=> $result),200);

/*convertion au formation json
id => $depense->$ getid();*/

	public function login($name, $password Application $app){
        $users = $app['GroupDAO']->login($name , $password);
        return $app->json(array(
				'records' => $result,
                'status' => 'OK'
			), 200);
    }
    public function logout($key, Application $app){
        $users = $app['GroupDAO']->logout($key);
        return $app->json(array(
				'records' => $result,
                'status' => 'OK'
			), 200);
    }

}

