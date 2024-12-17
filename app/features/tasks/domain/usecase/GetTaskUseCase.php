<?php
declare(strict_type=1);

namespace App\features\tasks\domain\usecase;

use App\features\tasks\domain\entity\TaskEntity;
use App\features\tasks\domain\entity\TaskPaginationEntity;
use App\features\tasks\domain\repository\TaskRepositoryInterface;
use App\features\tasks\domain\usecase\boundray\GetTaskUseCaseInterface;

class GetTaskUseCase implements GetTaskUseCaseInterface{
    public function __construct(
        public TaskRepositoryInterface $taskRepository
    ){}

    public function all ():array{
        return $this->taskRepository->index(); 
    }

    public function allWithPagination(int $itemPerPage):TaskPaginationEntity{
        return $this->taskRepository->indexPaginate($itemPerPage); 
    }

    public function byId(int $id):TaskEntity|null{
        return $this->taskRepository->show($id); 
    }
}
