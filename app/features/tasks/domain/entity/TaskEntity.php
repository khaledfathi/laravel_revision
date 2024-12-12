<?php

namespace App\features\tasks\domain\entity;

final class TaskEntity
{
    public function __construct(
        public ?int $id = null,
        public ?string $title = null,
        public ?string $description = null,
        public ?string $longDescription = null,
        public ?bool $completed = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
    ) {}
}
