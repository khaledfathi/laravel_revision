<?php

namespace App\features\tasks\domain\usecase;

use App\features\tasks\domain\entity\TaskEntity;
use App\features\tasks\domain\repository\TaskRepositoryInterface;
use App\features\tasks\domain\usecase\boundray\UpdateTaskUseCaseInterface;

final class UpdateTaskUseCase implements UpdateTaskUseCaseInterface
{
    public function __construct(public TaskRepositoryInterface $taskrepository) {}
    public function update(TaskEntity $task):bool {
        return $this->taskrepository->update($task);
    }
}
