<?php

namespace FriendlySold\Controller;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use FriendlySold\Domain\User;

class ApiController {

	/**
	*API
	*/






/*note exemple*/


/*return $app->json(array('records'=> $result),200);

/*convertion au formation json
id => $depense->$ getid();*/

	public function login(Request $request,  Application $app){
        $users = $app['GroupDAO']->login($request);

        return $app->json(array(
				'records' => $result,
                'status' => 'OK'
			), 200);
    }
    public function getlogout($key, Application $app){
        $users = $app['GroupDAO']->logout($key);
        return $app->json(array(
				'records' => $result,
                'status' => 'OK'
			), 200);
    }

}

