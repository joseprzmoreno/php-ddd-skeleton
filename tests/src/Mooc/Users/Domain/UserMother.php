<?php

declare(strict_types = 1);

namespace CodelyTv\Tests\Mooc\Users\Domain;

use CodelyTv\Mooc\Courses\Application\Create\CreateCourseCommand;
use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\CourseDuration;
use CodelyTv\Mooc\Courses\Domain\CourseName;
use CodelyTv\Mooc\Shared\Domain\Course\CourseId;
use CodelyTv\Mooc\Users\Application\CreateUserCommand;
use CodelyTv\Mooc\Users\Domain\User;
use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Tests\Mooc\Courses\Domain\CourseDurationMother;
use CodelyTv\Tests\Mooc\Courses\Domain\CourseIdMother;
use CodelyTv\Tests\Mooc\Courses\Domain\CourseNameMother;

final class UserMother
{
    public static function create(UserName $name, UserEmail $email): User
    {
        return new User($name, $email);
    }

    public static function fromRequest(CreateUserCommand $request): Course
    {
        return self::create(
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
