<?php

declare(strict_types = 1);

namespace CodelyTv\Tests\Mooc\Users\Domain;

use CodelyTv\Mooc\Courses\Domain\CourseName;
use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Tests\Shared\Domain\WordMother;

final class UserEmailMother
{
    public static function create(string $value): UserEmail
    {
        return new UserEmail($value);
    }

    public static function random(): UserEmail
    {
        return self::create('pepito' . rand(1111111, 9999999) . '@saz.com');
    }

    public static function invalid(): UserEmail
    {
        return self::create('pepito' . rand(1111111, 9999999) . 'saz.com');
    }
}
