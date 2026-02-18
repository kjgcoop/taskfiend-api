<?php

namespace TaskFiend\Data;

class Task
{
    /**
     * @param Tag[]  $tags
     * @param User[] $assignees
     */
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $description,
        public readonly string $status,
        public readonly int $creatorId,
        public readonly int $projectId,
        public readonly ?string $recurrencePattern,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly string $date,
        public readonly ?string $time,
        public readonly ?int $parentId,
        public readonly bool $recurrenceFloating,
        public readonly User $creator,
        public readonly Project $project,
        public readonly array $tags,
        public readonly array $assignees,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
            description: $data['description'],
            status: $data['status'],
            creatorId: $data['creator_id'],
            projectId: $data['project_id'],
            recurrencePattern: $data['recurrence_pattern'],
            createdAt: $data['created_at'],
            updatedAt: $data['updated_at'],
            date: $data['date'],
            time: $data['time'],
            parentId: $data['parent_id'],
            recurrenceFloating: $data['recurrence_floating'],
            creator: User::fromArray($data['creator']),
            project: Project::fromArray($data['project']),
            tags: array_map(fn(array $t) => Tag::fromArray($t), $data['tags']),
            assignees: array_map(fn(array $a) => User::fromArray($a), $data['assignees']),
        );
    }
}
