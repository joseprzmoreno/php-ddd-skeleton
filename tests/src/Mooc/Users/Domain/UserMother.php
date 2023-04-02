<?php

declare(strict_types = 1);

namespace CodelyTv\Tests\Mooc\Users\Domain;

use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Users\Application\Create\CreateUserCommand;
use CodelyTv\Mooc\Users\Domain\User;
use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Mooc\Users\Domain\UserName;

final class UserMother
{
    public static function create(UserId $id, UserName $name, UserEmail $email): User
    {
        return new User($id, $name, $email);
    }

    public static function fromRequest(CreateUserRequest $request): Course
    {
        return self::create(
            UserId::create($request->id()),
            UserName::create($request->name()),
            UserEmail::create($request->email())
        );
    }

    public static function random(): User
    {
        return self::create(UserNameMother::random(), UserEmailMother::random());
    }

    public static function withInvalidEmail(): User
    {
        return self::create(UserNameMother::random(), UserEmailMother::invalid());
    }
}
