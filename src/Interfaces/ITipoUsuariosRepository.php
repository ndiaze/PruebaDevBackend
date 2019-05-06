<?php

namespace App\Interfaces;


interface ITipoUsuariosRepository
{
    public function ReadAll();
    public function Read(int $id);
}