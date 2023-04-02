<?php

declare(strict_types = 1);

namespace CodelyTv\Tests\Mooc\Users\Domain;

use CodelyTv\Mooc\Courses\Domain\CourseName;
use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Shared\Infrastructure\RamseyUuidGenerator;
use CodelyTv\Tests\Shared\Domain\WordMother;

final class UserIdMother
{
    public static function create(string $value): UserName
    {
        return new UserId($value);
    }

    public static function random(): UserName
    {
        return self::create(RamseyUuidGenerator::uuid4()->toString());
    }
}
