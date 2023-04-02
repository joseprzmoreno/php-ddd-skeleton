<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Users\Application\Create;

use CodelyTv\Shared\Domain\Bus\Command\Command;

final class CreateUserCommand implements Command
{
    private $id;
    private $name;
    private $email;

    public function __construct(string $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }
}

