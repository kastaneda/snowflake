<?php
namespace Snowflake;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Symfony\Component\HttpFoundation\Request;

class MyServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->before(function (Request $request) {
            if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
                $data = json_decode($request->getContent(), true);
                $request->request->replace(is_array($data) ? $data : array());
            }
        });
    }

    public function boot(Application $app)
    {
    }
}
