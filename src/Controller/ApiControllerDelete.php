<?php
namespace Friendly\Controller;
use Silex\Apllication;
use Symfony\Component\HttpFoundation\Request;
use FriendlySold\Domain\User;

class ApiControllerDelete {
	 /**
     * API Delete details controller.
     *
     * @param integer $id Article id
     * @param Application $app Silex application
     *
     * @return Article details in JSON format
     */
    public function deleteUser($id, Application $app) {
        $user = $app['UserDAO']->delete($id);
        // Create and return a JSON response
        return $app->json($responseData);
    }
}

	public function deleteGroup($id, Application $app) {
        $group = $app['GroupDAO']->delete($id);
        // Create and return a JSON response
        return $app->json($responseData);
    }
}

	public function deleteMoney($id, Application $app) {
        $group = $app['MoneyDAO']->delete($id);
        // Create and return a JSON response
        return $app->json($responseData);
    }
}





/*note exemple*/


return $app->json(array('records'=> $result),200);

/*convertion au formation json */
id => $depense->$ getid();
