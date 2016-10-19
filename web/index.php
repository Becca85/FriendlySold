<?php

/*require 'db/Dbsingleton.php';*/
require_once __DIR__.'/../vendor/autoload.php';
$app = new Silex\Application();
require __DIR__.'/../app/config/dev.php';
require __DIR__.'/../app/app.php';
require __DIR__.'/../app/route.php';


$app->run();






?>

<!--<!DOCTYPE html>
<html>
<head>
	<title>friendySold</title>
</head>
<body>

<?php


?>
</body>
</html>-->





