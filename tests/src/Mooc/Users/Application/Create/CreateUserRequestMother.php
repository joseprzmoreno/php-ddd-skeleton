<?php

namespace CodelyTv\Tests\Mooc\Users\Application\Create;

use CodelyTv\Mooc\Shared\Domain\User\UserId;
use CodelyTv\Mooc\Users\Application\Create\CreateUserRequest;
use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Tests\Mooc\Users\Domain\UserIdMother;
use CodelyTv\Tests\Mooc\Users\Domain\UserNameMother;

final class CreateUserRequestMother
{
    public static function create(UserId $id, UserName $name, UserEmail $email): CreateUserRequest
    {
        return new CreateCourseRequest($id->value(), $name->value(), $email->value());
    }

    public static function random(): CreateUserRequest
    {
        return self::create(UserIdMother::random(), UserNameMother::random(), UserEmailMother::random());
    }
}
