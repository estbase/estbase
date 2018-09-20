<?php

namespace estbase\SharedKernel\Domain\Assertion;

use Assert\InvalidArgumentException;
use estbase\SharedKernel\Domain\Exception\DomainException;

class DomainAssertionFailedException extends InvalidArgumentException implements DomainException
{
}