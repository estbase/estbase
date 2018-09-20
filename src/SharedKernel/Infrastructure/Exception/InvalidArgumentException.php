<?php

namespace estbase\SharedKernel\Infrastructure\Exception;

class InvalidArgumentException extends GenericInfrastructureException
{
    /**
     * @param string $message
     * @param null $previous
     */
    public function __construct(string $message, $previous = null)
    {
        parent::__construct($message, $previous);
    }
}