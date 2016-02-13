<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

$app = new Application();
$app['debug'] = true;

$app->register(new Silex\Provider\DoctrineServiceProvider(),
    include __DIR__ . '/../share/config.php');

$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
});

$app->error(function (\Exception $e, $code) {
    return new JsonResponse(['error' => $e->getMessage()], 400);
});

$app->get('/api/v1/vote', function (Application $app) {
    // FIXME
    $sql = 'SELECT * FROM sf_vote';
    $post = $app['db']->fetchAssoc($sql);
    return $app->json($post);
});

$app->put('/api/v1/vote/{name}', function (Application $app, $name) {
    // FIXME
    $app->abort(403);
});

$app->put('/api/v1/user/{name}', function (Application $app, $name) {
    // FIXME
    $app->abort(400);
});

return $app;
