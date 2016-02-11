<?php
namespace Snowflake;

use Silex\Application;
use Silex\ControllerProviderInterface;

class UserControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->put('/{name}', function (Application $app, $name) {
            $app->abort(400);
        });

        return $controllers;
    }
}
