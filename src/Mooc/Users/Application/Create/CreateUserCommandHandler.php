<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Users\Application\Create;

use CodelyTv\Mooc\Shared\Domain\User\UserId;
use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Shared\Domain\Bus\Command\CommandHandler;

final class CreateUserCommandHandler implements CommandHandler
{
    private $creator;

    public function __construct(UserCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(CreateUserCommand $command)
    {
        $id    = new UserId($command->id());
        $name  = new UserName($command->name());
        $email = new UserEmail($command->email());

        $this->creator->__invoke($id, $name, $email);
    }
}
