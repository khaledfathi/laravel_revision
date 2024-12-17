<?php
declare(strict_type=1);

namespace App\features\tasks\domain\entity;

final class TaskPaginationEntity
{
    public function __construct(
        public array $tasks = [],
        public int $pages,
        public int $perPage ,
        public int $currentPage ,
        public ?int $firstItem,
        public ?int $lastItem,
        public ?int $lastPage,
        public int $total ,
        public bool $hasMorePages,
        public ?string $nextPageUrl , 
        public ?string $previousPageUrl, 
    ) {}
}
