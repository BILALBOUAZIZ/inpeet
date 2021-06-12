<?php
namespace real ;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class command
{
   
    
    public function get_command(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        # code... exploiter bd et effectuer le req
        #le rsultat de la req est le retour de response 

        return $response->withJson(array('id'=>1,'prix'=>500,'nomclient'=>"marc"));
    } 
}
