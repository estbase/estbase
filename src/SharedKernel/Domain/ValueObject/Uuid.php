<?php

namespace estbase\SharedKernel\Domain\ValueObject;

class Uuid extends EntityId
{
    /**
     * @var string
     */
    private $id;

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->id;
    }

    /**
     * @param EntityId|Uuid $id
     * @return bool
     */
    public function equalsTo(EntityId $id): bool
    {
        return $this->id === $id->getValue();
    }

    // TODO - TBC
}