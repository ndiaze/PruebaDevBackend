<?php

namespace App\Interfaces;
use App\Entity\Usuarios;

interface IUsuarioServices
{
    public function Create(Usuarios $usuario);
    public function ReadAll();
    public function Update($id, Usuarios $usuario);
}