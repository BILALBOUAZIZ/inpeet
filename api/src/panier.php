<?php

namespace real;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;




class panier
{

    public $db;

    function __construct($container)
    {
        $this->db = $container->db;
    }


    public function show_card(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("select * from panier ");
        $query->execute();
        $retour = $query->fetchAll();
        return $response->withJson($retour);
    }



    public function show_element_card(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("select * from panier where id_produit= :id_produit AND id_client=:id_client");
        $query->execute(array(':id_produit' => $args['id'], ':id_client' => $args['idcl']));
        $retour = $query->fetch();
        return $response->withJson($retour);
    }

    public function add_to_card(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        /*faut verifier que id client n'est pas nul*/
        
        $query = $this->db->prepare("INSERT INTO panier(id_client,id_produit) VALUES(:id_client,:id_produit )");
        $query->execute(array(':id_client' => $body['client'], ':id_produit' => $body['produit'], ));


        if ($query) {

            $data = ['message' => 'Produit ajoute au panier avec succes', 'status' => 200];
        } else {
            $data = ['message' => 'Erreur ', 'status' => 400];
        }

        return $response->withJson($data);
    }


    public function update_card(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        $query = $this->db->prepare("UPDATE panier SET qtt_panier = :qtt_panier    WHERE id_produit = :id_produit");
        $query->execute(array(':id_produit' => $args['id'], "qtt_panier" => $body["qtt"]));

        if ($query) {

            $data = ['message' => 'OK', 'status' => 200];
        } else {
            $data = ['message' => 'Erreur ', 'status' => 400];
        }
        return $response->withJson($data);
    }

    public function delete_card(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("DELETE FROM panier WHERE id_produit = :id_produit  AND id_client=:id_client");
        $query->execute(array(':id_produit' => $args['id'], ':id_client' => $args['idcl']));

        if ($query) {

            $data = ['message' => 'Produit supprime du panier avec succes', 'status' => 200];
        } else {
            $data = ['message' => 'Erreur ', 'status' => 400];
        }

        return $response->withJson($data);
    }
}
