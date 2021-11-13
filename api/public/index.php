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
    $app->get('/{idcl}/produit/{id}', \real\panier::class . ":show_element_cart"); // .... /command/2
    $app->post('/{idcl}', \real\panier::class . ":add_to_cart");
    $app->put('/{id}', \real\panier::class . ":update_cart");
    $app->delete('/{idcl}/produit/{id}', \real\panier::class . ":delete_cart");
});

$app->group("/categorie", function (App $app) {
    $app->get('/', \real\categorie::class . ":show_categ");
}); 


$app->group("/produit", function (App $app) {
    $app->get('', \real\produit::class . ":get_products"); 
    $app->get('/{idc}', \real\produit::class . ":par_catego"); 
    $app->get('/race/s{idr}', \real\produit::class . ":par_race"); 
    $app->post('', \real\produit::class . ":create_product");
    $app->put('/{id}', \real\produit::class . ":update_product");
    $app->delete('/{id}', \real\produit::class . ":delete_product");
});

$app->group("/race", function (App $app) {
   
    $app->get('/', \real\race::class . ":show_race"); // .... /command/ /* verbes http*/
    $app->get('/{id}', \real\race::class . ":show_element_race"); // .... /command/2
    $app->post('/', \real\race::class . ":add_to_race");
    $app->put('/{id}', \real\race::class . ":update_race");
    $app->delete('/{id}', \real\race::class . ":delete_race");
});

$app->group("/wishlist", function (App $app) {
   
    $app->get('/', \real\wishlist::class . ":get_wishlist"); // .... /command/ /* verbes http*/
    $app->get('/{idcl}/produit/{id}', \real\wishlist::class . ":get_wish_element"); // .... /command/2
    $app->post('/', \real\wishlist::class . ":add_wishlist");
    $app->delete('/{idcl}/produit/{id}', \real\wishlist::class . ":delete_wish");
});
$app->group("/avis", function (App $app) {
   
    $app->get('/', \real\avis::class . ":show_avis"); // .... /command/ /* verbes http*/
    $app->get('/{id}', \real\avis::class . ":show_element_race"); // .... /command/2
    $app->post('/', \real\avis::class . ":add_to_race");
    $app->put('/{id}', \real\avis::class . ":update_race");
    $app->delete('/{id}', \real\avis::class . ":delete_race");
});


$app->run();
