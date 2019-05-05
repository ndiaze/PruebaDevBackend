<?php

namespace App\Services;

use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use Psr\Container\ContainerInterface;
use App\Interfaces\ITipoClientesServices;
use App\Entity\TipoClientes;

class TipoClientesServices implements ITipoClientesServices
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
     * @return Lista de TipoClientes
     */
    public function ReadAll()
    {
        $repository = $this->entityManager->getRepository(TipoClientes::class);
        return $repository->ReadAll();
    }

    /**
     * Obtiene todo los registros por Id
     * @param int id
     * @return TipoClientes
     */
    public function Read(int $id)
    {
        return $this->_em->getRepository(TipoClientes::class)->findOneBy(array(
            'ticlId' => $id,
            'ticlFechamodificacion'=> null
        ));
    }

    
}