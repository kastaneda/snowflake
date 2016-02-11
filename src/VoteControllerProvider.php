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
            $sql = 'SELECT * FROM sf_vote';
            $post = $app['db']->fetchAssoc($sql);
            return $app->json($post);
        });

        $controllers->put('/{name}', function (Application $app, $name) {
            $app->abort(403);
        });

        return $controllers;
    }
}
