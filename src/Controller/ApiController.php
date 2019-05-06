<?php

namespace App\Controller;


use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\Config\Definition\Exception\Exception;
use App\Service\CustomSecurity;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use App\Entity\Usuarios;

/**
 * Class ApiController
 *
 * @Route("/api")
 */
class ApiController extends FOSRestController
{


    /**
     * @Rest\Get("/TipoUsuarios", name="obtener todos los tipos usuarios")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Obtener tipos de usuarios."
     * )
     *
     * @SWG\Response(
     *     response=500,
     *     description="An error has occurred trying to get all user."
     * )
     *
     * @SWG\Tag(name="TipoUsuarios")
     */
    public function TipoUsuariosReadAll(Request $request) 
    {
        $serializer = $this->get('jms_serializer');

        try {
            $servicio = $this->get('base.usuarios.service');
            $data = $servicio->ReadAll();

            $sc = Response::HTTP_OK;
            $result = Array(
                'code' => $sc ,
                'error' => false,
                'data' =>  is_null($data) ? [] : $data,
            );

        } catch (Exception $ex) {
            $sc = Response::HTTP_PRECONDITION_REQUIRED;
            $result = Array(
                'code' => $sc,
                'error' => true,
                'data' =>  $ex->getMessage(),
            );
        }

        $response = new Response($serializer->serialize($result, "json"));
        $response->headers->set('Content-Type', 'text/plain');
        $response->setStatusCode($sc);
        return $response;
    }

    /**
     * @Rest\Get("/TipoClientes", name="obtener todos los tipos clientes")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Obtener tipos de clientes."
     * )
     *
     * @SWG\Response(
     *     response=500,
     *     description="An error has occurred trying to get all user."
     * )
     *
     * @SWG\Tag(name="TipoClientes")
     */
    public function TipoClientesReadAll(Request $request) 
    {
        $serializer = $this->get('jms_serializer');

        try {
            $servicio = $this->get('base.usuarios.service');
            $data = $servicio->ReadAll();

            $sc = Response::HTTP_OK;
            $result = Array(
                'code' => $sc ,
                'error' => false,
                'data' =>  is_null($data) ? [] : $data,
            );

        } catch (Exception $ex) {
            $sc = Response::HTTP_PRECONDITION_REQUIRED;
            $result = Array(
                'code' => $sc,
                'error' => true,
                'data' =>  $ex->getMessage(),
            );
        }

        $response = new Response($serializer->serialize($result, "json"));
        $response->headers->set('Content-Type', 'text/plain');
        $response->setStatusCode($sc);
        return $response;
    }

    

    
}