<?php

namespace App\features\tasks\domain\usecase;

use App\features\tasks\domain\repository\TaskRepositoryInterface;

class DeleteTaskUseCase {

    public function __construct(
        public TaskRepositoryInterface $TaskRepositroy
    ){ }

    public function deleteById(int $id):bool{
        return $this->TaskRepositroy->destroy($id); 
    } 
}
