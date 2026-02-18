<?php

namespace TaskFiend\Data;

class Tag
{
    public function __construct(
        public readonly int $id,
        public readonly string $tagName,
        public readonly string $color,
        public readonly string $createdAt,
        public readonly string $updatedAt,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            tagName: $data['tag_name'],
            color: $data['color'],
            createdAt: $data['created_at'],
            updatedAt: $data['updated_at'],
        );
    }
}
