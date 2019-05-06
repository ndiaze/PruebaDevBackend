<?php

namespace App\Interfaces;


interface ITipoUsuariosServices 
{
    public function ReadAll();
    public function Read(int $id);
}