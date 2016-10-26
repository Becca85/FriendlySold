<?php

namespace FriendlySold\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use FriendlySold\Domain\User;
use FriendlySold\Domain\Group;
use FriendlySold\Domain\Money;
//cd /enchant_dict_check(dict, word);

Class APIControllerCreate {

    // fonction pour ajouter et mettre a jour un utilisateur
	public function addUser(Request $request, Application $app){

		try{
                $user = new User;
                
                // methode pour récupérer et decoder le format json
                $data = json_decode($request->getContent(), true);
                $request->request->replace(is_array($data) ? $data : array());

                // on verifie que nous avons bien toute les valeurs dont nous avons besoin
                if ($request->request->has('username') && $request->request->has('usergroup') && $request->request->has('usercolor')) {
                if ($request->request->has('Id')) 
                //on hydrate notre objet (cad on donne les valeurs aux attributs)
                    $user->setId($request->request->get('Id'));
                $user->setUsername($request->request->get('username'));
                $user->setGroup($request->request->get('usergroup'));
                $user->setColor($request->request->get('usercolor'));
                }
                // message d'erreur en json 
                else {
                    return $app->json(array(
                    'records' => [],
                    'status' => 'KO',
                    'error' => 'error in json file',
                    ), 400);
                }

                //on appelle la fontion Save de UserDAO
                $users = $app['UserDAO']->save($user);
                // on affiche le resultat en json
                $result = array(
                	"id"=>$user->getId(),
                	"username"=> $user->getUsername()
                	);
                return $app->json(array(
				'records' => $result,
                'status' => 'OK'
				), 200);
            }

        catch(Exception $e){
                return $app->json(array(
                    'records' => [],
                    'status' => 'KO',
                    'error' => $e->getMessage()
                ), 400);
        
	   }
    }

   // fonction pour ajouter et mettre a jour un groupe
    public function addGroup(Request $request, Application $app){

        try{
                $group = new Group;
                
                // methode pour récupérer et decoder le format json
                $data = json_decode($request->getContent(), true);
                $request->request->replace(is_array($data) ? $data : array());

                // on verifie que nous avons bien toute les valeurs dont nous avons besoin
                if ($request->request->has('groupname') && $request->request->has('password') && $request->request->has('key')) {
                if ($request->request->has('Id')) 
                //on hydrate notre objet (cad on donne les valeurs aux attributs)
                    $group->setId($request->request->get('Id'));
                $group->setGroupname($request->request->get('groupname'));
                $group->setPassword($request->request->get('password'));
                $group->setKey($request->request->get('key'));
                }
                // message d'erreur en json 
                else {
                    return $app->json(array(
                    'records' => [],
                    'status' => 'KO',
                    'error' => 'error in json file',
                    ), 400);
                }

                //on appelle la fontion Save de UserDAO
                $groups = $app['GroupDAO']->save($group);
                // on affiche le resultat en json
                $result = array(
                    "id"=>$group->getId(),
                    "groupname"=> $group->getGroupname()
                    );
                return $app->json(array(
                'records' => $result,
                'status' => 'OK'
                ), 200);
            }
            
        catch(Exception $e){
                return $app->json(array(
                    'records' => [],
                    'status' => 'KO',
                    'error' => $e->getMessage()
                ), 400);
        }

    }

   // fonction pour ajouter et mettre a jour les depenses
    public function addMoney(Request $request, Application $app){

        try{
                $money = new Money;
                
                // methode pour récupérer et decoder le format json
                $data = json_decode($request->getContent(), true);
                $request->request->replace(is_array($data) ? $data : array());

                // on verifie que nous avons bien toute les valeurs dont nous avons besoin
                if ($request->request->has('montant') && $request->request->has('payeur') && $request->request->has('date') && $request->request->has('group') && $request->request->has('description')) {
                    if ($request->request->has('Id')) 
                    //on hydrate notre objet (cad on donne les valeurs aux attributs)
                        $money->setId($request->request->get('Id'));
                    $money->setMontant($request->request->get('montant'));
                    $money->setIdPayeur($request->request->get('payeur'));
                    $money->setdate($request->request->get('date'));
                    $money->setGroup($request->request->get('group'));
                    $money->setDescription($request->request->get('description'));
                }
                // message d'erreur en json 
                else {
                    return $app->json(array(
                    'records' => [],
                    'status' => 'KO',
                    'error' => 'error in json file',
                    ), 400);
                }

                //on appelle la fontion Save de UserDAO
                $groups = $app['MoneyDAO']->save($money);
                // on affiche le resultat en json
                $result = array(
                    "id"=>$money->getId(),
                    "montant"=> $money->getMontant()
                    );
                return $app->json(array(
                'records' => $result,
                'status' => 'OK'
                ), 200);
            }
            
        catch(Exception $e){
                return $app->json(array(
                    'records' => [],
                    'status' => 'KO',
                    'error' => $e->getMessage()
                ), 400);
        }
    }
}
        