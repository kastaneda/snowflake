<?php
namespace Snowflake;

use Silex\Application;
use Silex\ControllerProviderInterface;

class VoteControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/', function (Application $app) {
            return 'Тут должны быть результаты';
        });

        $controllers->put('/{name}', function (Application $app, $name) {
            $app->abort(403);
        });

        return $controllers;
    }
}
