<?php

namespace App\Repository;


use Doctrine\ORM\EntityRepository;
use App\Interfaces\ITipoClientesRepository;
use App\Entity\TipoClientes;

class TipoClientesRepository extends EntityRepository implements ITipoClientesRepository
{
    public function ReadAll()
    {
        return $this->_em->getRepository(TipoClientes::class)->findBy(array(
            'ticlFechaeliminacion'=> null
        ));
    }

    public function Read(int $id)
    {
        return $this->_em->getRepository(TipoClientes::class)->findOneBy(array(
            'ticlId' => $id,
            'ticlFechaeliminacion'=> null
        ));
    }

}