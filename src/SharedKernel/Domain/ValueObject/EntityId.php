<?php

namespace estbase\SharedKernel\Domain\ValueObject;

abstract class EntityId
{
    public abstract function getValue();

    public abstract function equalsTo(EntityId $id);
}
