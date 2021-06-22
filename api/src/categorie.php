<?php

namespace real;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;




class categorie
{

    public $db;

    function __construct($container)
    {
        $this->db = $container->db;
    }


    public function show_categ (Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("select * from categorie where id_categorie= :id_categorie");
        $query->execute(array('id_categorie' => $args['id_categorie']));
        $retour = $query->fetch();
        return $response->withJson($retour);
    }

}