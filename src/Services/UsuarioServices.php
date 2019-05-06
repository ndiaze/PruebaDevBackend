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
use App\Entity\TipoClientes;
use App\Entity\TipoUsuarios;

class UsuarioServices implements IUsuarioServices
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var ContainerInterface
     */
    private $container;
    /**
     * @var RequestStack
     */
    protected $requestStack;
    /**
     * @var RequestStack
     */
    protected $req;

    /**
     * Costructor
     * @param EntityManagerInterface $entityManager
     * @param ContainerInterface $container
     * @param RequestStack $requestStack
     */
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

    /**
     * Crear un usuario
     * @param Usuarios $pUsuarios
     */
    public function Create(Usuarios $pUsuarios)
    {
        //@ParamConver no agrega la clase anidada
        $idTipoClientes = $pUsuarios->getUsuaTicl()->getTiclId();   
        $referenceTipoClientes = $this->entityManager->getRepository(TipoClientes::class)->find($idTipoClientes);
        $pUsuarios->setUsuaTicl($referenceTipoClientes);

        $idTipoUsuarios = $pUsuarios->getUsuaTius()->getTiusId();           
        $referenceTipoUsuarios = $this->entityManager->getRepository(TipoUsuarios::class)->find($idTipoUsuarios);
        $pUsuarios->setUsuaTius($referenceTipoUsuarios);

        $repository = $this->entityManager->getRepository(Usuarios::class);
        $repository->Create($pUsuarios);

    }

    /**
     * Obtiene todo los registros
     * @return Lista de TipoClientes
     */
    public function ReadAll()
    {
        $repository = $this->entityManager->getRepository(Usuarios::class);
        return $repository->ReadAll();
    }

    public function Update($id, Usuarios $pUsuarios)
    {
        //@ParamConver no agrega la clase anidada
        $idTipoClientes = $pUsuarios->getUsuaTicl()->getTiclId();   
        $referenceTipoClientes = $this->entityManager->getRepository(TipoClientes::class)->find($idTipoClientes);
        $pUsuarios->setUsuaTicl($referenceTipoClientes);

        $idTipoUsuarios = $pUsuarios->getUsuaTius()->getTiusId();           
        $referenceTipoUsuarios = $this->entityManager->getRepository(TipoUsuarios::class)->find($idTipoUsuarios);
        $pUsuarios->setUsuaTius($referenceTipoUsuarios);

        $repository = $this->entityManager->getRepository(Usuarios::class);
        $repository->Update($id, $pUsuarios);
    }

}