<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Users\Domain;

use CodelyTv\Shared\Domain\Aggregate\AggregateRoot;

final class User extends AggregateRoot
{
    private $name;
    private $email;

    public function __construct(UserName $name, UserEmail $email)
    {
        $this->name      = $name;
        $this->email     = $email;
    }

    public static function create(UserName $name, UserEmail $email): self
    {
        $user = new self($name, $email);

        // $user->record(new CourseCreatedDomainEvent($id->value(), $name->value(), $duration->value()));

        return $user;
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
