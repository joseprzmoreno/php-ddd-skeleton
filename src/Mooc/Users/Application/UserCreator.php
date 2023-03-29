<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Users\Application;


use CodelyTv\Mooc\Users\Domain\User;
use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Mooc\Users\Domain\UserRepository;
use CodelyTv\Shared\Domain\Bus\Event\EventBus;

final class UserCreator
{
    private $name;
    private $email;

    public function __construct(UserRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->bus        = $bus;
    }

    public function __invoke(UserName $name, UserEmail $email)
    {
        $user = User::create($name, $email);

        $this->repository->save($user);
    }
}
