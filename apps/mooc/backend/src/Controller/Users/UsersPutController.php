<?php

declare(strict_types = 1);

namespace CodelyTv\Apps\Mooc\Backend\Controller\Users;

use CodelyTv\Mooc\Users\Application\Create\CreateUserCommand;
use CodelyTv\Shared\Domain\Bus\Command\CommandBus;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class UsersPutController
{
    private $bus;

    public function __construct(CommandBus $bus)
    {
       $this->bus = $bus;
    }

    public function __invoke(Request $request): Response
    {
        $this->bus->dispatch(
            new CreateUserCommand(
                Uuid::uuid4()->toString(),
                $request->get('name'),
                $request->get('email'),
            )
        );

        return new Response('', Response::HTTP_CREATED);
    }
}
