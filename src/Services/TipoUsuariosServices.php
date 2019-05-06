<?php

namespace App\Services;

use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use Psr\Container\ContainerInterface;
use App\Interfaces\ITipoUsuariosServices;
use App\Entity\TipoUsuarios;

class TipoUsuariosServices implements ITipoUsuariosServices
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
     * Obtiene todo los registros
     * @return Lista de TipoUsuarios
     */
    public function ReadAll()
    {
        $repository = $this->entityManager->getRepository(TipoUsuarios::class);
        return $repository->ReadAll();
    }

    /**
     * Obtiene todo los registros por Id
     * @param int id
     * @return TipoUsuarios
     */
    public function Read(int $id)
    {
        return $this->_em->getRepository(TipoUsuarios::class)->findOneBy(array(
            'tiusId' => $id,
            'tiusFechaeliminacion'=> null
        ));
    }

    
}