<?php

namespace Kjgcoop\TaskFiend\Data;

class User
{
    public function __construct(
        public readonly int $id,
        public readonly string $email,
        public readonly string $name,
        public readonly ?string $emailEnabledAt,
        public readonly ?string $emailVerifiedAt,
        public readonly string $createdAt,
        public readonly string $updatedAt,
        public readonly string $profileImage,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            email: $data['email'],
            name: $data['name'],
            emailEnabledAt: $data['email_enabled_at'],
            emailVerifiedAt: $data['email_verified_at'],
            createdAt: $data['created_at'],
            updatedAt: $data['updated_at'],
            profileImage: $data['profile_image'],
        );
    }
}
