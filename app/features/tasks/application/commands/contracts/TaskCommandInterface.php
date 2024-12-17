<?php
declare(strict_type=1);

namespace App\features\tasks\application\commands\contracts;

use App\features\tasks\domain\entity\TaskEntity;
use App\features\tasks\domain\entity\TaskPaginationEntity;

interface TaskCommandInterface
{
    public function getAll(int $itemPerPage = 10): TaskPaginationEntity;

    public function get(int $id): TaskEntity|null;

    public function create(TaskEntity $task): int;

    public function update(TaskEntity $task);

    public function delete(int $id): bool;
}
