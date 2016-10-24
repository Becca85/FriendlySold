<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

$app['DAO'] = $app->share(function ($app) {
    return new FriendlySold\DAO\DAO($app['db']);
});

$app['UserDAO'] = $app->share(function ($app) {
    return new FriendlySold\DAO\UserDAO($app['db']);
});
$app['GroupDAO'] = $app->share(function ($app) {
    return new FriendlySold\DAO\GroupDAO($app['db']);
});
$app['MoneyDAO'] = $app->share(function ($app) {
    return new FriendlySold\DAO\MoneyDAO($app['db']);
});


?>
