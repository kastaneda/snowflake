<?php
require_once __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);         // FIXME
ini_set('display_errprs', 1);   // FIXME

$app = new Silex\Application();
$app['debug'] = true;           // FIXME

$app->register(new Snowflake\MyServiceProvider());
$app->mount('/api/v1/user', new Snowflake\UserControllerProvider());
$app->mount('/api/v1/vote', new Snowflake\VoteControllerProvider());
$app->run();
