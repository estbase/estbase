<?php

namespace estbase\SharedKernel\Application\Exception;

class InvalidArgumentException extends GenericApplicationException implements ApplicationException
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