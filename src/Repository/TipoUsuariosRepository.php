<?php

namespace App\Repository;


use Doctrine\ORM\EntityRepository;
use App\Interfaces\ITipoUsuariosRepository;
use App\Entity\TipoUsuarios;

class TipoUsuariosRepository extends EntityRepository implements ITipoUsuariosRepository
{
    public function ReadAll()
    {
        return $this->_em->getRepository(TipoUsuarios::class)->findBy(array(
            'tiusFechaeliminacion'=> null
        ));
    }

    public function Read(int $id)
    {
        return $this->_em->getRepository(TipoUsuarios::class)->findOneBy(array(
            'tiusId' => $id,
            'tiusFechaeliminacion'=> null
        ));
    }

}