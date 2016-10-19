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
        $responseData = $this->buildArticleArray($article);
        // Create and return a JSON response
        return $app->json($responseData);
    }
}





/*note exemple*/


return $app->json(array('records'=> $result),200);

/*convertion au formation json */
id => $depense->$ getid();