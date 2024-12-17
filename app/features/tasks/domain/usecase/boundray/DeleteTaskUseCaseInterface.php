<?php
declare(strict_type=1);

namespace App\features\tasks\domain\usecase\boundray; 


interface  DeleteTaskUseCaseInterface {

    public function deleteById(int $id):bool;
}
