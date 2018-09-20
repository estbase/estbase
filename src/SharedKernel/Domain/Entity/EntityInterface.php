<?php

namespace estbase\SharedKernel\Domain\Entity;

use estbase\SharedKernel\Domain\ValueObject\EntityId;

interface EntityInterface
{
    /**
     * @return EntityId
     */
    public function getId();
}