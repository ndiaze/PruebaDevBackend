<?php

namespace App\Repository;


use Doctrine\ORM\EntityRepository;
use App\Interfaces\IUsuariosRepository;
use App\Entity\Usuarios;

class UsuariosRepository extends EntityRepository implements IUsuariosRepository
{
    /**
     * Crea un usuario
     * @param Usuario $usuario
     */
    public function Create(Usuarios $usuario)
    {
        $this->_em->persist($usuario);
        $this->_em->flush();
        return $usuario;
    }
    /**
     * Obtiene todos los registros
     */
    public function ReadAll()
    {
        return $this->_em->getRepository(Usuarios::class)->findBy(array(
            'usuaFechaeliminacion'=> null
        ));
    }
     /**
     * Actualiza un registro por id
     * @param int $id
     * @param Usuario $usuario
     */
    public function Update($id, Usuarios $usuario)
    {
        $content = $this->_em->getRepository(Usuarios::class)->findOneBy(array('usuaId' => $id));

        if(!empty($content))
        {
            $content->setUsuaNombre($usuario->getUsuaNombre());
            $content->setUsuaApellidopaterno($usuario->getUsuaApellidopaterno());
            $content->setUsuaApellidomaterno($usuario->getUsuaApellidomaterno());
            $content->setUsuaCorreo($usuario->getUsuaCorreo());
            $content->setUsuaEstado($usuario->getUsuaEstado());
            $content->setUsuaTicl($usuario->getUsuaTicl());
            $content->setUsuaTius($usuario->getUsuaTius());
            $this->_em->flush();
        }else{
            throw new Exception('MSJ-4XXG-USUARIONOEXISTE');
        }
    }
}