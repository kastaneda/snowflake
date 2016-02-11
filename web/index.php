<?php
require_once __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);         // FIXME
ini_set('display_errprs', 1);   // FIXME

$app = new Silex\Application();
$app['debug'] = true;           // FIXME

$app->register(new Snowflake\MyServiceProvider());
$app->mount('/', new Snowflake\MyControllerProvider());
$app->run();
