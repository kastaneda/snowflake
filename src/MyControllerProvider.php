<?php
namespace Snowflake;

use Silex\Application;
use Silex\ControllerProviderInterface;

class MyControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/', function (Application $app) {
            return $app->redirect('/hello/world');
        });

        $controllers->get('/hello/{name}', function (Application $app, $name) {
            return '<h1>Hello, ' . $app->escape(ucfirst($name)) . '!</h1>';
        });

        return $controllers;
    }
}
