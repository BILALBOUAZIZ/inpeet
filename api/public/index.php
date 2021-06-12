<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../../vendor/autoload.php';

$app = new \Slim\App([   /*pour afficher les erreurs*/

    'settings' => [
        'displayErrorDetails' => true,
        'debug'               => true,
    ]

]);
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->get('/command3/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $response->getBody()->write("Commande, $id");

    return $response;
});
$app->get('/command/{id}', \real\command::class.":get_command");
$app->run();