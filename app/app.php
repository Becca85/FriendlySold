<?php
use Symfony\Component\HttpFoundation\Request;
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\ServiceControllerServiceProvider());
?>
