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

/*convertion au fpormation json
id => $depense->$ getid();*/

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

