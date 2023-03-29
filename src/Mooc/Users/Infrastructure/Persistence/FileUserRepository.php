<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Users\Infrastructure\Persistence;

use CodelyTv\Mooc\Users\Domain\User;
use CodelyTv\Mooc\Users\Domain\UserRepository;

final class FileUserRepository implements UserRepository
{
    private const FILE_PATH = __DIR__ . '/courses';

    public function save(User $user): void
    {
        file_put_contents($this->fileName($user->name()->value()), 'Usuario con email ' . $user->email()->value());
    }

    private function fileName(string $name): string
    {
        return sprintf('%s.%s.repo', self::FILE_PATH, $name);
    }
}
