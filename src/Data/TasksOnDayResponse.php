<?php

namespace Kjgcoop\TaskFiend\Data;

class TasksOnDayResponse
{
    /**
     * @param Task[] $tasks
     */
    public function __construct(
        public readonly bool $success,
        public readonly string $date,
        public readonly array $done,
        public readonly array $archived,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            success: $data['success'],
            date: $data['date'],
            done: array_map(fn(array $t) => Task::fromArray($t), $data['done']),
            archived: array_map(fn(array $t) => Task::fromArray($t), $data['archived']),
        );
    }
}
