<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Users\Application;

use CodelyTv\Mooc\Courses\Application\Create\CourseCreator;
use CodelyTv\Mooc\Courses\Application\Create\CreateCourseCommand;
use CodelyTv\Mooc\Courses\Domain\CourseDuration;
use CodelyTv\Mooc\Courses\Domain\CourseName;
use CodelyTv\Mooc\Shared\Domain\Course\CourseId;
use CodelyTv\Mooc\Users\Domain\UserEmail;
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
        $name     = new UserName($command->name());
        $email    = new UserEmail($command->email());

        $this->creator->__invoke($name, $email);
    }
}
