<?php

namespace real;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;




class client
{

    public $db;

    function __construct($container)
    {
        $this->db = $container->db;
    }


    public function show_clients(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("select * from client ");
        $query->execute();
        $retour = $query->fetchAll();
        return $response->withJson($retour);
    }



    public function show_client(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("select * from client where id_client=:id_client");
        $query->execute(array(':id_client' => $args['id'], ));
        $retour = $query->fetch();
        return $response->withJson($retour);
    }

    public function add_client(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        /*faut verifier que id client n'est pas nul*/
        
        $query = $this->db->prepare("INSERT INTO client(id_client,nom_client,prenom_client,tel_client,date_naissance,sexe,email,mdp_client) VALUES(:id_client,:nom_client,:prenom_client,:tel_client,:date_naissance,:sexe,:email,:mdp_client )");
        $query->execute(array(':id_client' => $body['idcl'], ':nom_client' => $body['nom_client'], ':prenom_client' => $body['prenom_client'],':tel_client' => $body['tel_client'],':date_naissance' => $body['date_naissance'],':sexe' => $body['sexe'],':email' => $body['email'], ':mdp_client' => $body['mdp_client'], ));


        if ($query) {

            $data = ['message' => 'OK', 'status' => 200];
        } else {
            $data = ['message' => 'Erreur ', 'status' => 400];
        }

        return $response->withJson($data);
    }


    public function update_client(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        $query = $this->db->prepare("UPDATE client SET tel_client = :tel_client AND mdp_client = :mdp_client   WHERE id_client = :id_client");
        $query->execute(array(':id_client' => $args['id'], "tel_client" => $body["tel_client"],"mdp_client" => $body["mdp_client"] ));

        if ($query) {

            $data = ['message' => 'OK', 'status' => 200];
        } else {
            $data = ['message' => 'Erreur ', 'status' => 400];
        }
        return $response->withJson($data);
    }

    public function delete_client(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("DELETE FROM client WHERE id_client = :id_client  ");
        $query->execute(array(':id_client' => $args['id']));

        if ($query) {

            $data = ['message' => 'Client supprime  avec succes', 'status' => 200];
        } else {
            $data = ['message' => 'Erreur ', 'status' => 400];
        }

        return $response->withJson($data);
    }
}
