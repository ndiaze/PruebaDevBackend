<?php

namespace App\Interfaces;


interface ITipoClientesServices 
{
    public function ReadAll();
    public function Read(int $id);
}