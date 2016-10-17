<?php

/*require 'db/Dbsingleton.php';*/
require_once __DIR__.'/../vendor/autoload.php';
$app = new Silex\Application();
require __DIR__.'/../app/config/prod.php';
require __DIR__.'/../app/app.php';
require __DIR__.'/../app/routes.php';


$app->run();







/*<!DOCTYPE html>
<html>
<head>
	<title>friendySold</title>
</head>
<body>

<?php $sth = $dbh->prepare("SELECT `mon_montant` FROM `t_money` WHERE `mon_id` = 3");

	$sth->execute();
	$result = $sth->fetchAll(); 
		
	print_r($result);	
</body>
</html>
*/



