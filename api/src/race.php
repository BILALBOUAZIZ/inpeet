<?php

namespace real;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;




class race
{

    public $db;

    function __construct($container)
    {
        $this->db = $container->db;
    }


    public function show_race(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("select * from race ");
        $query->execute();
        $retour = $query->fetchAll();
        return $response->withJson($retour);
    }



    public function show_element_race(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("select * from race where id_race= :id_race ");
        $query->execute(array(':id_race' => $args['id']));
        $retour = $query->fetch();
        return $response->withJson($retour);
    }

    public function add_to_race(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        /*faut verifier que id client n'est pas nul*/
        
        $query = $this->db->prepare("INSERT INTO race(id_race,nom_race) VALUES(:id_race,:nom_race )");
        $query->execute(array(':id_race' => $body['id'], ':nom_race' => $body['nom_race'], ));


        if ($query) {

            $data = ['message' => 'Race ajoutee  avec succes', 'status' => 200];
        } else {
            $data = ['message' => 'Erreur ', 'status' => 400];
        }

        return $response->withJson($data);
    }


    public function update_race(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        $query = $this->db->prepare("UPDATE race SET nom_race = :nom_race    WHERE id_race = :id_race");
        $query->execute(array(':id_race' => $args['id'], "nom_race" => $body["nom_race"]));

        if ($query) {

            $data = ['message' => 'OK', 'status' => 200];
        } else {
            $data = ['message' => 'Erreur ', 'status' => 400];
        }
        return $response->withJson($data);
    }

    public function delete_race(Request $request, Response $response, array $args)
    {

        $query = $this->db->prepare("DELETE FROM race WHERE id_race = :id_race ");
        $query->execute(array(':id_race' => $args['id']));

        if ($query) {

            $data = ['message' => 'Race supprimee  avec succes', 'status' => 200];
        } else {
            $data = ['message' => 'Erreur ', 'status' => 400];
        }

        return $response->withJson($data);
    }
}
