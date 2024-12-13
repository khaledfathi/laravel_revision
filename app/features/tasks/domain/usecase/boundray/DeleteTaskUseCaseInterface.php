<?php

namespace App\features\tasks\domain\usecase\boundray; 


interface  DeleteTaskUseCaseInterface {

    public function deleteById(int $id):bool;
}
