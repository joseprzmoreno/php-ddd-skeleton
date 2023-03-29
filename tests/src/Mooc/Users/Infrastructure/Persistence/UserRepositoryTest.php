<?php

declare(strict_types = 1);

namespace CodelyTv\Tests\Mooc\Users\Infrastructure\Persistence;

use CodelyTv\Mooc\Users\Domain\User;
use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Mooc\Users\Domain\UserRepository;
use CodelyTv\Tests\Mooc\Courses\UsersModuleInfrastructureTestCase;
use CodelyTv\Tests\Mooc\Users\Domain\UserMother;
use CodelyTv\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;

final class UserRepositoryTest extends UnitTestCase
{

    /** @test */
    public function it_should_save_a_user(): void
    {
        $user = UserMother::random();

        $repository = $this->createMock(UserRepository::class);

        $repository->save($user);
    }

    /** @test */
    public function it_should_not_save_a_user(): void
    {

        $user = UserMother::withInvalidEmail();

        $repository = $this->createMock(UserRepository::class);

        $this->expectException(\InvalidArgumentException::class);
        $repository->save($user);
    }

}
