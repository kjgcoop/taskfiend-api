<?php

namespace Kjgcoop\TaskFiend\Data;

class Comment
{
    public function __construct(
        public readonly int $id,
        public readonly int $userId,
        public readonly int $taskId,
        public readonly string $comment,
        public readonly ?string $filePath,
        public readonly ?string $originalFilename,
        public readonly ?string $mimeType,
        public readonly ?int $fileSize,
        public readonly string $createdAt,
        public readonly string $updatedAt,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            userId: $data['user_id'],
            taskId: $data['task_id'],
            comment: $data['comment'],
            filePath: $data['file_path'],
            originalFilename: $data['original_filename'],
            mimeType: $data['mime_type'],
            fileSize: $data['file_size'],
            createdAt: $data['created_at'],
            updatedAt: $data['updated_at'],
        );
    }
}
