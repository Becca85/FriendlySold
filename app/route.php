<?php

/*getter*/
	$app->get(
		/*'/read/group/{id}/money',*/

        '/read/group/{id}/money',

	"FriendlySold\Controller\ApiControllerRead::getMoney"
	)->bind('read_depenses');

	$app->get(
        /*read/group/{id}/users**/
		'read/group/{id}/users',
		"FriendlySold\Controller\ApiControllerRead::getUsers"
	)->bind('read_users');

    $app->get(
		'/read/group/{id}/group',
		'FriendlySold\Controller\ApiControllerRead::getGroups'
	)->bind('read_groups');


/*setter*/
	$app->post(
		'/save/group',
		'FriendlySold\Controller\ApiControllerCreate::addGroup'
	)->bind('add_group');

	$app->post(
		'/save/money',
		'FriendlySold\Controller\ApiControllerCreate::addMoney'
	)->bind('add_depense');


	$app->post(
		'/save/user',
		'FriendlySold\Controller\ApiControllerCreate::addUser'
	)->bind('save_user');

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
    $app->post(
        '/login/',
        'FriendlySold\Controller\ApiController::login'
    )->bind('api_login');

    $app->post(
        '/logout/',
        'FriendlySold\Controller\ApiController::logout'
    )->bind('api_logout');
