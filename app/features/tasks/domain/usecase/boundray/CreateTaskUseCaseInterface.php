<?php
declare(strict_type=1);

namespace App\features\tasks\domain\usecase\boundray; 

use App\features\tasks\domain\entity\TaskEntity;

interface CreateTaskUseCaseInterface  {
    public function create (TaskEntity $task):int;
}