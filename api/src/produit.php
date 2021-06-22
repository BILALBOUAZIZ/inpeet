<?php

namespace real;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;




class produit extends categorie
{

    public $db;

    function __construct($container)
    {
        $this->db = $container->db;
    }


    public function get_products(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("select * from produit ");
        $query->execute();
        $retour = $query->fetchAll();
        return $response->withJson($retour);
    }



    public function par_catego(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("select * from produit where id_categorie= :id_categorie");
        $query->execute(array(':id_categorie' => $args['idc']));
        $retour = $query->fetch();
        return $response->withJson($retour);

    }


    public function par_race(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("select * from produit where id_race= :id_race");
        $query->execute(array(':id_race' => $args['idr']));
        $retour = $query->fetch();
        return $response->withJson($retour);
    }



    public function create_product(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        /*faut verifier que id client n'est pas nul*/
        $query = $this->db->prepare("INSERT INTO produit(id_race,id_categorie,label,prix_produit) VALUES(:id_race,:id_categorie,:label,:prix_produit )");
        $query->execute(array(':id_race' => $body['race'], ':id_categorie' => $body['categorie'],':label' => $body['label'], ':prix_produit' => $body['prix']));


        if ($query) {

            $data = ['message' => 'OK', 'status' => 200];
        } else {
            $data = ['message' => 'Erreur ', 'status' => 400];
        }

        return $response->withJson($data);
    }


    public function update_command(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        $query = $this->db->prepare("UPDATE produit SET prix_produit= :prix_produit    WHERE id_produit = :id_produit");
        $query->execute(array(':id_produit' => $args['id'], "prix_produit" => $body["prix"]));

        if ($query) {

            $data = ['message' => 'Prix modifie avec succes', 'status' => 200];
        } else {
            $data = ['message' => 'Erreur ', 'status' => 400];
        }
        return $response->withJson($data);
    }

    public function delete_command(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("DELETE FROM produit WHERE id_produit = :id_produit");
        $query->execute(array(':id_produit' => $args['id']));

        if ($query) {

            $data = ['message' => 'Produit supprimee avec succes', 'status' => 200];
        } else {
            $data = ['message' => 'Erreur', 'status' => 400];
        }

        return $response->withJson($data);
    }
}
