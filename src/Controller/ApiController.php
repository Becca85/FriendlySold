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
        try{
            $key = $app['GroupDAO']->login($request);
            }catch(Exception $e){
                return $app->json(array(
                    'status' => 'KO',
                    'error' => $e->getMessage()
                ), 400);
        }
        return $app->json(array(
                'status' => 'OK',
                'key' => $key
			), 200);
    }
    public function logout( Request $request, Application $app){
            try {
                $key = $app['GroupDAO']->logout($request);
            } catch(Exception $e){
                return $app->json(array(
                    'status' => 'KO',
                    'error' => $e->getMessage()
                ), 400);

            }

            return $app->json(array(
                'status' => 'OK'
            ), 200);
        
    }

}


