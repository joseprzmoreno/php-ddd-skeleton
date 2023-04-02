<?php

namespace CodelyTv\Tests\Mooc\Users\Application\Create;

use CodelyTv\Mooc\Users\Application\Create\UserCreator;
use CodelyTv\Mooc\Users\Domain\UserCreatedDomainEvent;
use CodelyTv\Tests\Mooc\Users\Application\UserRequestMother;
use CodelyTv\Tests\Mooc\Users\Domain\UserMother;
use CodelyTv\Tests\Mooc\Users\UsersModuleUnitTestCase;
use CodelyTv\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;

class UserCreatorTest extends UsersModuleUnitTestCase
{
    private $creator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->creator = new UserCreator($this->repository());
    }

    /** @test */
    public function it_should_create_a_valid_user(): void
    {
        $request = CreateUserRequestMother::random();
        $user = UserMother::fromRequest($request);
        $domainEvent = UserCreatedDomainEvent::fromUser($user);
        $this->shouldSave($user);
        // $this->shouldPublishDomainEvent($domainEvent);
        $this->creator->__invoke($request);
    }
}
