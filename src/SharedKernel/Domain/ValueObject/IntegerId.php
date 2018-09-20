<?php

namespace estbase\SharedKernel\Domain\ValueObject;

use estbase\SharedKernel\Domain\Assertion\DomainAssertion;

class IntegerId extends EntityId
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @param int $id
     * @return IntegerId
     * @throws \Assert\AssertionFailedException
     */
    public function setId(int $id) : IntegerId
    {
        DomainAssertion::integer($id);
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->id;
    }

    /**
     * @param EntityId $id
     * @return bool
     */
    public function equalsTo(EntityId $id): bool
    {
        return $this->id === $id->getValue();
    }

    // TODO - TBC
}