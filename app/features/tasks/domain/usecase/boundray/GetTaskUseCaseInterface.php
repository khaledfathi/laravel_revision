<?php
declare(strict_type=1);

namespace App\features\tasks\domain\usecase\boundray; 

use App\features\tasks\domain\entity\TaskEntity;
use App\features\tasks\domain\entity\TaskPaginationEntity;

interface GetTaskUseCaseInterface {

    public function all ():array;

    public function allWithPagination(int $itemPerPage):TaskPaginationEntity;

    public function byId(int $id):TaskEntity|null;
}
