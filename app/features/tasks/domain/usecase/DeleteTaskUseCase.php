<?php

namespace App\features\tasks\domain\usecase;

use App\features\tasks\domain\repository\TaskRepositoryInterface;
use App\features\tasks\domain\usecase\boundray\DeleteTaskUseCaseInterface;

final class DeleteTaskUseCase implements DeleteTaskUseCaseInterface{

    public function __construct(
        public TaskRepositoryInterface $TaskRepositroy
    ){ }

    public function deleteById(int $id):bool{
        return $this->TaskRepositroy->destroy($id); 
    } 
}
