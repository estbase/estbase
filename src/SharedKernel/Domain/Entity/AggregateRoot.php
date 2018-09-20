<?php

namespace estbase\SharedKernel\Domain\Entity;

use estbase\SharedKernel\Domain\Event\DomainEvent;
use estbase\SharedKernel\Domain\ValueObject\EntityId;

abstract class AggregateRoot
{
    /** @var EntityId */
    protected $id;
    /**
     * @var DomainEvent[]
     */
    private $events = [];

    /**
     * @param EntityId $id
     * @return AggregateRoot
     */
    public function setId($id) : AggregateRoot
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return EntityId
     */
    public function getId(): EntityId
    {
        return $this->id;
    }
}