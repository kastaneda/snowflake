<?php
require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/', function () use ($app) {
    return $app->redirect('/hello/world');
});

$app->get('/hello/{name}', function ($name) use ($app) {
    return '<h1>Hello, ' . $app->escape(ucfirst($name)) . '!</h1>';
});

$app->run();
