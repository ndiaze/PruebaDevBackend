<?php

namespace App\Repository;


use Doctrine\ORM\EntityRepository;
use App\Interfaces\IUsuariosRepository;
use App\Entity\Usuarios;

class UsuariosRepository extends EntityRepository implements IUsuariosRepository
{
    public function ReadAll()
    {
        return $this->_em->getRepository(Usuarios::class)->findBy(array(
            'usuaFechaeliminacion'=> null
        ));
    }
}