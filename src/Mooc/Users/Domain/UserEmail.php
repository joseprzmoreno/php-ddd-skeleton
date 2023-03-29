<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Users\Domain;

use CodelyTv\Shared\Domain\ValueObject\StringValueObject;

final class UserEmail extends StringValueObject
{

    public function __construct(string $value)
    {
        $this->ensureItHasTheAtSign($value);

        parent::__construct($value);
    }

    private function ensureItHasTheAtSign(string $email): void
    {
        if(strpos($email, '@') === false) {
            throw new \InvalidArgumentException('El mail no tiene arroba');
        }
    }
}
