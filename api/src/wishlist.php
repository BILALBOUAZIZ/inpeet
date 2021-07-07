<?php

namespace real;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;




class wishlist
{

    public $db;

    function __construct($container)
    {
        $this->db = $container->db;
    }


    public function get_wishlist(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("select * from wishlist ");
        $query->execute();
        $retour = $query->fetchAll();
        return $response->withJson($retour)->withStatus(200);
    }



    public function get_wish_element(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("select * from wishlist where id_produit= :id_produit AND id_client=:id_client");
        $query->execute(array(':id_produit' => $args['id'], ':id_client' => $args['idcl']));
        $retour = $query->fetch();
        return $response->withJson($retour)->withStatus(200);
    }

    public function add_wishlist(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        /*faut verifier que id client n'est pas nul*/
        $query = $this->db->prepare("INSERT INTO wishlist(id_client,id_produit) VALUES(:id_client,:id_produit )");
        $query->execute(array(':id_client' => $body['idcl'], ':id_produit' => $body['produit'], ));


        if ($query) {

            $data = ['message' => 'Produit ajoute aux favoris ', 'status' => 200];
        } else {
            $data = ['message' => 'Erreur ', 'status' => 400];
        }
        return $response->withJson($data)->withStatus($data["status"]);
        
    }


    

    public function delete_wish(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("DELETE FROM wishlist WHERE id_produit = :id_produit  AND id_client=:id_client");
        $query->execute(array(':id_produit' => $args['id'], ':id_client' => $args['idcl']));


        if ($query) {

            $data = ['message' => 'Produit supprime des favoris', 'status' => 200];
        } else {
            $data = ['message' => 'Erreur ', 'status' => 400];
        }

        return $response->withJson($data)->withStatus($data["status"]);;
    }
}
