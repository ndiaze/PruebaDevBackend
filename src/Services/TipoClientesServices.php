<?php

namespace App\Services;

use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;

use App\Interfaces\ITipoClientesServices;
use App\Entity\TipoClientes;

class TipoClientesServices implements ITipoClientesServices
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

    public function ReadAll()
    {
        $repository = $this->entityManager->getRepository(TipoClientes::class);
        return $repository->ReadAll();
    }

    
}