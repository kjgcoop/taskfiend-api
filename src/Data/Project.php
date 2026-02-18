<?php

namespace TaskFiend\Data;

class Project
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly ?string $description,
        public readonly int $userId,
        public readonly string $status,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly bool $isInbox,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
            description: $data['description'],
            userId: $data['user_id'],
            status: $data['status'],
            createdAt: $data['created_at'],
            updatedAt: $data['updated_at'],
            isInbox: (bool) $data['is_inbox'],
        );
    }
}
