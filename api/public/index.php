<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\App;

require '../../vendor/autoload.php';

$app = new \Slim\App([   /*pour afficher les erreurs*/
    'settings' => [
        'displayErrorDetails' => true,
        'debug'               => true,
    ]
]);
$container = $app->getContainer();
$container["db"] =  function () {
    $pdo = new PDO("mysql:host=localhost;dbname=inpet;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
};

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("test meriam li ktbat hadchi $name");
    return $response;
});

$app->get('/command3/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $response->getBody()->write("Commande, $id");

    return $response;
});
$app->group("/command", function (App $app) {
    $app->get('/', \real\command::class . ":get_commands"); // .... /command/ /* verbes http*/
    $app->get('/{id}', \real\command::class . ":get_command"); // .... /command/2
    $app->post('/', \real\command::class . ":create_command");
    $app->put('/{id}', \real\command::class . ":update_command");
    $app->delete('/{id}', \real\command::class . ":delete_command");
});

$app->group("/panier", function (App $app) {
    $app->get('/', \real\panier::class . ":show_cart"); // .... /command/ /* verbes http*/
    $app->get('/{id},{idcl}', \real\panier::class . ":show_element_cart"); // .... /command/2
    $app->post('/', \real\panier::class . ":add_to_cart");
    $app->put('/{id}', \real\panier::class . ":update_cart");
    $app->delete('/{id},{idcl}', \real\panier::class . ":delete_cart");
});

$app->group("/categorie", function (App $app) {
    $app->get('/', \real\categorie::class . ":show_categ");
}); 


$app->group("/produit", function (App $app) {
    $app->get('/', \real\produit::class . ":get_products"); 
    $app->get('/{idc}', \real\produit::class . ":par_catego"); 
    $app->get('/{idr}', \real\produit::class . ":par_race"); 
    $app->post('/', \real\produit::class . ":create_product");
    $app->put('/{id}', \real\produit::class . ":update_product");
    $app->delete('/{id}', \real\produit::class . ":delete_product");
});


$app->run();
