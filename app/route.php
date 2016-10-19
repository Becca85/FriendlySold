<?php

	$app->get(
		'/read/group/{group_id}/money',
		'Compta\Controller\APIControllerRead::getmoney'
	)->bind('read_depenses');

	$app->get(
		'/read/group/{group_id}/users',
		'Compta\Controller\APIControllerRead::getUsers'
	)->bind('read_users');
//jefaisgetUsers Juliette <3 //
    $app->get(
		'/read/group/{group_id}/group',
		'Compta\Controller\APIControllerRead::getGroups'
	)->bind('read_groups');

	$app->post(
		'/add/group',
		'Compta\Controller\APIControllerCreate::addGroup'
	)->bind('add_group');

	$app->post(
		'/add/money',
		'Compta\Controller\APIControllerCreate::addmoney'
	)->bind('add_depense');

	$app->post(
		'/add/user',
		'Compta\Controller\APIControllerCreate::addUser'
	)->bind('add_user');

	$app->delete(
		'/api/group/{id}',
		'Compta\Controller\APIControllerDelete::deleteGroup'
	)->bind('api_group_delete');

	$app->delete(
		'/api/money/{id}',
		'Compta\Controller\APIControllerDelete::deletemoney'
	)->bind('api_depense_delete');

	$app->delete(
		'/api/user/{id}',
		'Compta\Controller\APIControllerDelete::deleteUser'
	)->bind('api_user_delete');

    $app->login(
        '/api/group/{id}',
        'Compta\Controller\APIController::login'
    )->bind('api_login');

    $app->logout(
        '/api/group/{id}',
        'Compta\Controller\APIController::logout'
    )->bind('api_logout')


?>
