<?php

namespace App\Interfaces;


interface ITipoClientesRepository
{
    public function ReadAll();
    public function Read(int $id);

}