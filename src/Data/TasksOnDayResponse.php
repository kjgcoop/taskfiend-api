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
        public readonly array $tasks,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            success: $data['success'],
            date: $data['date'],
            tasks: array_map(fn(array $t) => Task::fromArray($t), $data['tasks']),
        );
    }
}
