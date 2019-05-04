<?php

namespace App\Services;

use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;

use Psr\Container\ContainerInterface;
use App\Interfaces\IUsuarioServices;
use App\Entity\Usuarios;

class UsuarioServices implements IUsuarioServices
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    private $container;
    protected $requestStack;
    protected $req;

    public function __construct(
        EntityManagerInterface $entityManager,
        ContainerInterface $container,
        RequestStack $requestStack
    )
    {
        $this->entityManager = $entityManager;
        $this->container = $container;
        $this->requestStack = $requestStack;
        $this->req = $this->requestStack->getCurrentRequest();
    }

    public function Create()
    {
        $security = $this->container->get("police.security.service");

        $entity = new Usuarios();
        $entity->setUsuaCorreo($this->req->request->get("usuaCorreo", null));
        $entity->setUsuaNombre($this->req->request->get("usuaNombre", null));
        $entity->setUsuaApellidopaterno($this->req->request->get("usuaApellidopaterno", null));
        $entity->setUsuaApellidomaterno($this->req->request->get("usuaApellidomaterno", null));

        $repository = $this->entityManager->getRepository(Usuarios::class);
        $usuario = $repository->Create($entity);

    }

    public function ReadAll()
    {
        $repository = $this->entityManager->getRepository(Usuarios::class);
        return $repository->ReadAll();
    }

}