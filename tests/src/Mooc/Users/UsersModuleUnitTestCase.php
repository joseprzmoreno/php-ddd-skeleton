<?php

declare(strict_types = 1);

namespace CodelyTv\Tests\Mooc\Users;

use CodelyTv\Mooc\Users\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use CodelyTv\Mooc\Shared\Domain\Course\CourseId;
use CodelyTv\Mooc\Users\Domain\User;
use CodelyTv\Mooc\Users\Domain\UserRepository;
use CodelyTv\Mooc\Users\Infrastructure\Persistence\DoctrineUserRepository;
use CodelyTv\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class UsersModuleUnitTestCase extends UnitTestCase
{
    private $repository;

    protected function shouldSave(User $user): void
    {
        $this->repository()->method('save')->with($user);
    }

    /** @return CourseRepository|MockInterface */
    protected function repository(): MockInterface
    {
        return $this->repository = $this->repository ?: $this->mock(DoctrineUserRepository::class);
    }
}
