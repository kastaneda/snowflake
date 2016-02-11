<?php
require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Snowflake\MyServiceProvider());
$app->register(new Silex\Provider\DoctrineServiceProvider(),
    include __DIR__ . '/../share/config.php');
$app->mount('/api/v1/user', new Snowflake\UserControllerProvider());
$app->mount('/api/v1/vote', new Snowflake\VoteControllerProvider());
$app->run();
