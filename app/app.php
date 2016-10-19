<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

$app['UserDAO'] = $app->share(function ($app) {
    return new FriendlySold\DAO\UserDAO($app['db']);
});

?>
