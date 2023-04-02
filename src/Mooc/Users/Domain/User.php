<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Users\Domain;

use CodelyTv\Mooc\Shared\Domain\User\UserId;
use CodelyTv\Shared\Domain\Aggregate\AggregateRoot;

final class User extends AggregateRoot
{
    private $id;
    private $name;
    private $email;

    public function __construct(UserId $id, UserName $name, UserEmail $email)
    {
        $this->id        = $id;
        $this->name      = $name;
        $this->email     = $email;
    }

    public static function create(UserId $id, UserName $name, UserEmail $email): self
    {
        $user = new self($id, $name, $email);

        $user->record(new UserCreatedDomainEvent($id->value(), $name->value(), $email->value()));

        return $user;
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }

}
