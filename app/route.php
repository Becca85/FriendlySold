<?php

/*exemple*/


/*a adapter*/
// Home page


=======

	$app->get(
		'/read/group/{group_id}/money',
		'Compta\Controller\APIControllerRead::getmoney'
	)->bind('read_depenses');

	$app->get(
		'/read/group/{id}/users',
		'Compta\Controller\APIControllerRead::getUsers'
	)->bind('read_users');
//jefais getUsers Juliette <3 //
    $app->get(
		'/read/group/{group_id}/group',
		'Compta\Controller\APIControllerRead::getGroups'
	)->bind('read_groups');

	$app->post(
		'/add/group',
		'Compta\Controller\ApiControllerCreate::addGroup'
	)->bind('add_group');

	$app->post(
		'/add/money',
		'Compta\Controller\ApiControllerCreate::addmoney'
	)->bind('add_depense');

	$app->post(
		'/add/user',
		'Compta\Controller\ApiControllerCreate::addUser'
	)->bind('add_user');

	$app->delete(
		'/api/group/{id}',
		'Compta\Controller\ApiControllerDelete::deleteGroup'
	)->bind('api_group_delete');

	$app->delete(
		'/api/money/{id}',
		'Compta\Controller\ApiControllerDelete::deletemoney'
	)->bind('api_depense_delete');
/* je fait le delete redfish*/
	$app->delete(
		'/api/user/{id}',
		'Compta\Controller\ApiControllerDelete::deleteUser'
	)->bind('api_user_delete');
/*red*/
/*Solved by red*/
    $app->login(
        '/api/group/{id}',
        'Compta\Controller\ApiController::login'
    )->bind('api_login');

    $app->logout(
        '/api/group/{id}',
        'Compta\Controller\ApiController::logout'
    )->bind('api_logout')
/*red*/

?>

