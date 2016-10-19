<?php


	$app->get(
		'/read/group/{group_id}/money',
		'FriendlySold\Controller\APIControllerRead::getmoney'
	)->bind('read_depenses');

	$app->get(
		'/read/group/{id}/users',
		'FriendlySold\Controller\ApiControllerRead::getUsers'
	)->bind('read_users');
//jefais getUsers Juliette <3 //
    $app->get(
		'/read/group/{group_id}/group',
		'FriendlySold\Controller\APIControllerRead::getGroups'
	)->bind('read_groups');

	$app->post(
		'/add/group',
		'FriendlySold\Controller\APIControllerCreate::addGroup'
	)->bind('add_group');

	$app->post(
		'/add/money',
		'FriendlySold\Controller\APIControllerCreate::addmoney'
	)->bind('add_depense');

	$app->post(
		'/add/user',
		'FriendlySold\Controller\APIControllerCreate::addUser'
	)->bind('add_user');

	$app->delete(
		'/api/group/{id}',
		'FriendlySold\Controller\APIControllerDelete::deleteGroup'
	)->bind('api_group_delete');

	$app->delete(
		'/api/money/{id}',
		'FriendlySold\Controller\APIControllerDelete::deletemoney'
	)->bind('api_depense_delete');
/* je fait le delete redfish*/
	$app->delete(
		'/api/user/{id}',
		'FriendlySold\Controller\APIControllerDelete::deleteUser'
	)->bind('api_user_delete');
/*red*/
    $app->login(
        '/api/group/{id}',
        'FriendlySold\Controller\APIController::login'
    )->bind('api_login');

    $app->logout(
        '/api/group/{id}',
        'FriendlySold\Controller\APIController::logout'
    )->bind('api_logout')


?>

