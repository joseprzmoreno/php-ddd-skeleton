<?php

declare(strict_types = 1);

namespace CodelyTv\Apps\Mooc\Backend\Controller\Users;

use CodelyTv\Mooc\Users\Domain\User;
use CodelyTv\Mooc\Users\Domain\UserEmail;
use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Mooc\Users\Domain\UserRepository;
use CodelyTv\Mooc\Users\Infrastructure\Persistence\FileUserRepository;
use CodelyTv\Shared\Domain\Bus\Command\CommandBus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class UsersPutController
{
    private $bus;
    /**
     * @var FileUserRepository
     */
    private $repo;

    public function __construct(FileUserRepository $repo)
    {
       $this->repo = $repo;
    }

    public function __invoke(string $name, string $email)
    {
        $user = new User(new UserName($name), new UserEmail($email));

        $this->repo->save($user);

        return new Response('', Response::HTTP_CREATED);
    }
}
