<?php

/*getter*/
	$app->get(
		/*'/read/group/{id}/money',*/

        '/read/group/{id}/money',

	"FriendlySold\Controller\ApiControllerRead::getMoney"
	)->bind('read_depenses');

	$app->match(
        /*read/group/{id}/users**/
		'read/group/{id}/users',
		"FriendlySold\Controller\ApiControllerRead::getUsers"
	)->bind('read_users');

//jefais getUsers Juliette <3 //
    $app->get(
		'/read/group/{group_id}/group',
		'FriendlySold\Controller\ApiControllerRead::getGroups'
	)->bind('read_groups');
/*setter*/
	$app->post(
		'/add/group',
		'FriendlySold\Controller\ApiControllerCreate::addGroup'
	)->bind('add_group');

	$app->post(
		'/add/money',
		'FriendlySold\Controller\ApiControllerCreate::addMoney'
	)->bind('add_depense');
//Je fais le addUser Rebecca //
	$app->post(
		'api/user/{id}',
		'FriendlySold\Controller\ApiControllerCreate::addUser'
	)->bind('add_user');

/*delete*/
/* je fait le delete redfish*/
	$app->delete(
		'/api/group/{id}',
		'FriendlySold\Controller\ApiControllerDelete::deleteGroup'
	)->bind('api_group_delete');

	$app->delete(
		'/api/money/{id}',

		'FriendlySold\Controller\ApiControllerDelete::deleteMoney'
	)->bind('api_Money_delete');

	$app->delete(
		'/api/user/{id}',
		'FriendlySold\Controller\ApiControllerDelete::deleteUser'
	)->bind('api_User_delete');



/*log in&out*/
    


    $app->getlogin(
        '/api/{name}/{password}',
        'FriendlySold\Controller\ApiController::getlogin'

    )->bind('api_login');

    $app->getlogout(
        '/api/{key}',

        'FriendlySold\Controller\ApiController::getlogout'
    )->bind('api_logout');


