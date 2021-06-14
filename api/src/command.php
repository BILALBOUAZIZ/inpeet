<?php

namespace real;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;




class command
{
    public $db;

    function __construct($container)
    {
        $this->db = $container->db;
    }


    public function get_commands(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("select * from commande ");
        $query->execute();
        $retour = $query->fetchAll(PDO::FETCH_ASSOC);
        return $response->withJson($retour);
    }



    public function get_command(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("select * from commande where id_commande= :id_commande");
        $query->execute(array(':id_commande' => $args['id']));
        $retour = $query->fetch();
        return $response->withJson($retour);
    }

    public function create_command(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();

        $query = $this->db->prepare("INSERT INTO commande VALUES(:prix, .... )");
        $query->execute(array(':prix' => $body['prix']));
        $retour = $query->fetch();
        return $response->withJson($retour);
    }

    public function update_command(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        $query = $this->db->prepare("UPDATE commande SET prix= :prix ,  WHERE id_commande = :id_commande");
        $query->execute(array(':id_commande' => $args['id'],"prix" => $body["prix"]));
        $retour = $query->fetch();
        return $response->withJson($retour);
    }

    public function delete_command(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("select * from commande where id_commande= :id_commande");
        $query->execute(array(':id_commande' => $args['id']));
        $retour = $query->fetch();
        return $response->withJson($retour);
    }
}
