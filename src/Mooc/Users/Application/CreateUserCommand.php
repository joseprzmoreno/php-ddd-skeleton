<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Users\Application;

use CodelyTv\Shared\Domain\Bus\Command\Command;

final class CreateUserCommand implements Command
{
    private $name;
    private $email;

    public function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->email = $email;
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

