<?php

namespace estbase\SharedKernel\Domain\Assertion;

use Assert\Assertion;

final class DomainAssertion extends Assertion
{
    protected static $exceptionClass = DomainAssertionFailedException::class;
}