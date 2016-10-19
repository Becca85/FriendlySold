<?php

/*Doctrine=module de silex (db) page de connexion a la page php*/

$app['db.options']=array(
	'driver' => 'pdo_mysql',
	'charset' => 'utf8',
	'host' => '127.0.0.1',
	'port' => '3306',
	'dbname' => 'FriendlySold',
	'user' => 'FriendlySold_user',
	'password' => 'secret',
);
// user a test  bug?//

$app['debug'] = true;

// defini les erreurs log

//$app['monolog.level'] = 'INFO';
