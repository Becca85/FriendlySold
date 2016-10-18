<?php

/*require 'db/Dbsingleton.php';*/
require_once __DIR__.'/../vendor/autoload.php';
$app = new Silex\Application();
require __DIR__.'/../app/config/dev.php';
require __DIR__.'/../app/app.php';
require __DIR__.'/../app/routes.php';


$app->run();






?>

<!DOCTYPE html>
<html>
<head>
	<title>friendySold</title>
</head>
<body>

<?php 

		
	echo($tableau_db);	

?>
</body>
</html>-->





