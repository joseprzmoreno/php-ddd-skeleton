<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Users\Application\Create;


use CodelyTv\Mooc\Shared\Domain\User\UserId;
use CodelyTv\Mooc\Users\Domain\User;
use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Mooc\Users\Infrastructure\Persistence\DoctrineUserRepository;
use CodelyTv\Shared\Domain\Aggregate\AggregateRoot;
use CodelyTv\Shared\Domain\Bus\Event\EventBus;

final class UserCreator extends AggregateRoot
{
    private $repository;
    private $bus;

    public function __construct(DoctrineUserRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->bus        = $bus;
    }

    public function __invoke(CreateUserRequest $request)
    {
        $id       = new UserId($request->id());
        $name     = new UserName($request->name());
        $email    = new UserEmail($request->duration());

        $user = User::create($id, $name, $email);

        $this->repository->save($user);
        $this->publisher->publish(...$user->pullDomainEvents());
    }
}
