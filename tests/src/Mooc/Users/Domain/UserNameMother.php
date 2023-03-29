<?php

declare(strict_types = 1);

namespace CodelyTv\Tests\Mooc\Users\Domain;

use CodelyTv\Mooc\Courses\Domain\CourseName;
use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Tests\Shared\Domain\WordMother;

final class UserNameMother
{
    public static function create(string $value): UserName
    {
        return new UserName($value);
    }

    public static function random(): UserName
    {
        return self::create('pepito' . rand(111111,999999));
    }
}
