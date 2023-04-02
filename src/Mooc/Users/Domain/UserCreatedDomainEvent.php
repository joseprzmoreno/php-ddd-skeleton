<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Users\Domain;

use CodelyTv\Shared\Domain\Bus\Event\DomainEvent;

final class UserCreatedDomainEvent extends DomainEvent
{
    private $id;
    private $name;
    private $email;

    public function __construct(
        string $id,
        string $name,
        string $email,
        string $eventId = null,
        string $occurredOn = null
    ) {
        parent::__construct($eventId, $occurredOn);

        $this->id       = $id;
        $this->name     = $name;
        $this->email    = $email;
    }

    public static function eventName(): string
    {
        return 'user.created';
    }

    public function toPrimitives(): array
    {
        return [
            'name'     => $this->name,
            'email'    => $this->email,
        ];
    }

    public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): DomainEvent {
        return new self($aggregateId, $body['name'], $body['email'], $eventId, $occurredOn);
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
