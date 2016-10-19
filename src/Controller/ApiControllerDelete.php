<?php
namespace Friendly\Controller;
use Silex\Apllication;
use Symfony\Component\HttpFoundation\Request;
use Friendly\Domain\User;

class ApiControllerDelete {
	 /**
     * API Delete details controller.
     *
     * @param integer $id Article id
     * @param Application $app Silex application
     *
     * @return Article details in JSON format
     */
    public function DeleteUser($id, Application $app, User) {
        $user = $app['UserDAO']->delete($id);
        $responseData = $this->buildArticleArray($User);
        // Create and return a JSON response
        return $app->json($responseData);
    }
}

	public function DeleteGroup($Group_id, Application $app, Group) {
        $group = $app['GroupDAO']->delete($id);
        $responseData = $this->buildArticleArray($Group);
        // Create and return a JSON response
        return $app->json($responseData);
    }
}

	public function DeleteMoney($Money_id, Application $app, Money) {
        $group = $app['MoneyDAO']->delete($id);
        $responseData = $this->buildArticleArray($Money);
        // Create and return a JSON response
        return $app->json($responseData);
    }
}





/*note exemple*/


return $app->json(array('records'=> $result),200);

/*convertion au formation json */
id => $depense->$ getid();
