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
 * Class UsuarioController
 *
 * @Route("/api")
 */
class UsuarioController extends FOSRestController
{


    /**
     * @Rest\Post("/Usuarios", name="crear usuario")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Se ha creado el usuario correctamente"
     * )
     *
     * @SWG\Response(
     *     response=500,
     *     description="A ocurrido un error al crear un usuario"
     * )
     *
     * @SWG\Parameter(
     *     name="perfNombre",
     *     in="query",
     *     type="string",
     *     description="Nombre del usuario"
     * )
     *
     *
     * @SWG\Tag(name="Usuarios")
     * @ParamConverter("pUsuarios", converter="fos_rest.request_body")
     * @param Usuarios $pUsuarios
     * @return Response
     */
    public function Create(Usuarios $pUsuarios) 
    {

        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getManager();
        $message = "";
        $sc = Response::HTTP_PRECONDITION_REQUIRED;

        try {
            
            $servicio = $this->get('base.usuarios.service');
            $servicio->Create($pUsuarios);

            $sc = Response::HTTP_OK;
            $result = Array(
                'code' => $sc ,
                'error' => false,
                'data' =>  "MSJ-200C-USUARIOS",
            );
        } catch (Exception $ex) {
            $result = Array(
                'code' => $sc,
                'error' => true,
                'data' =>  $ex->getMessage(),
            );
        } catch (\Doctrine\DBAL\DBALException $ex){
            /*switch($ex->getErrorCode()){
                case 1062:
                    $message = "MSJ-4XXC-USUARIODUPLICADO";
                    break;
            }*/

            $result = Array(
                'code' => $sc,
                'error' => true,
                'data' =>  $message,
            );
        }

        $response = new Response($serializer->serialize($result, "json"));
        $response->headers->set('Content-Type', 'text/plain');
        $response->setStatusCode($sc);

        return $response;
        
    }

    /**
     * @Rest\Get("/Usuarios", name="obtener todos los usuarios")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Obtener usuarios."
     * )
     *
     * @SWG\Response(
     *     response=500,
     *     description="An error has occurred trying to get all user."
     * )
     *
     * @SWG\Tag(name="Usuarios")
     */
    public function ReadAll(Request $request) 
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
     * @Rest\Get("/Usuarios/{id}", name="filtrar usuarios por id")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Obtener usuarios."
     * )
     *
     * @SWG\Response(
     *     response=500,
     *     description="An error has occurred trying to get all user."
     * )
     * 
     * @SWG\Parameter(
     *     name="id",
     *     in="query",
     *     type="string",
     *     description="id del usuarios"
     * )
     * 
     * @SWG\Tag(name="Usuarios")
     */
    public function Read(Request $request) 
    {
        $serializer = $this->get('jms_serializer');
        $id = $request->attributes->get('id');

        try {
            $servicio = $this->get('base.usuarios.service');
            $data = $servicio->Read((int)$id);

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
     * @Rest\Put("/Usuarios/{id}", name="Modificar usuarios")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Se ha modificado el usuarios correctamente"
     * )
     *
     * @SWG\Response(
     *     response=500,
     *     description="A ocurrido un error al modificar un usuarios"
     * )
     *
     * @SWG\Parameter(
     *     name="nombre",
     *     in="query",
     *     type="string",
     *     description="Nombre del usuarios"
     * )
     *
     *
     * @SWG\Tag(name="Usuarios")
     * @ParamConverter("pUsuarios", converter="fos_rest.request_body")
     * @param int $id
     * @param Usuarios $pUsuarios
     */
    public function Update(int $id, Usuarios $pUsuarios) {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getManager();
        $message = "";

        try {

            $servicio = $this->get('base.usuarios.service');
            $servicio->Update($id, $pUsuarios);

            $sc = Response::HTTP_OK;
            $result = Array(
                'code' => $sc ,
                'error' => false,
                'data' =>  "MSJ-200U-USUARIOS",
            );
        } catch (Exception $ex) {
            $sc = Response::HTTP_PRECONDITION_REQUIRED;
            $result = Array(
                'code' => $sc,
                'error' => true,
                'data' =>  $ex->getMessage(),
            );
        } catch (\Doctrine\DBAL\DBALException $ex){
            switch($ex->getErrorCode()){
                case 1062:
                    $message = "MSJ-4XXC-PERFILDUPLICADO";
                    break;
            }

            $sc = Response::HTTP_PRECONDITION_REQUIRED;
            $result = Array(
                'code' => $sc,
                'error' => true,
                'data' =>  $message,
            );
        }

        $response = new Response($serializer->serialize($result, "json"));
        $response->headers->set('Content-Type', 'text/plain');
        $response->setStatusCode($sc);

        return $response;
    }

    

    
}