<?php

namespace App\Repository;


use Doctrine\ORM\EntityRepository;
use App\Interfaces\IUsuariosRepository;
use App\Entity\Usuarios;

class UsuariosRepository extends EntityRepository implements IUsuariosRepository
{
    public function Create(Usuarios $usuario)
    {
        $this->_em->persist($usuario);
        $this->_em->flush();
        return $usuario;
    }
    
    public function ReadAll()
    {
        return $this->_em->getRepository(Usuarios::class)->findBy(array(
            'usuaFechaeliminacion'=> null
        ));
    }
}