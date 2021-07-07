<?php

namespace real;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;




class avis
{

    public $db;

    function __construct($container)
    {
        $this->db = $container->db;
    }


    public function show_avis(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("select * from avis ");
        $query->execute();
        $retour = $query->fetchAll();
        return $response->withJson($retour);
    }



    public function show_element_avis(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("select * from avis where id_produit= :id_produit AND id_client=:id_client");
        $query->execute(array(':id_produit' => $args['id'], ':id_client' => $args['idcl']));
        $retour = $query->fetch();
        return $response->withJson($retour);
    }

    public function add_avis(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        /*faut verifier que id client n'est pas nul*/
        
        $query = $this->db->prepare("INSERT INTO avis(id_client,id_produit,commentaire) VALUES(:id_client,:id_produit,:commentaire )");
        $query->execute(array(':id_client' => $body['idcl'], ':id_produit' => $body['produit'], 'commentaire' => $body['commentaire'] ));


        if ($query) {

            $data = ['message' => 'avis ajoute  avec succes', 'status' => 200];
        } else {
            $data = ['message' => 'Erreur ', 'status' => 400];
        }

        return $response->withJson($data);
    }


    public function update_avis(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        $query = $this->db->prepare("UPDATE race SET ranking = :ranking    WHERE id_produit = :id_produit AND id_client = :id_client ");
        $query->execute(array(':id_produit' => $args['id'], ':id_client' => $args['idcl'], "ranking" => $body["ranking"]));

        if ($query) {

            $data = ['message' => 'OK', 'status' => 200];
        } else {
            $data = ['message' => 'Erreur ', 'status' => 400];
        }
        return $response->withJson($data);
    }

    public function delete_avis(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("DELETE FROM avis WHERE id_produit = :id_produit  AND id_client=:id_client");
        $query->execute(array(':id_produit' => $args['id'], ':id_client' => $args['idcl']));

        if ($query) {

            $data = ['message' => 'avis supprime  avec succes', 'status' => 200];
        } else {
            $data = ['message' => 'Erreur ', 'status' => 400];
        }

        return $response->withJson($data);
    }
}
