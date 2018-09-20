<?php

namespace estbase\SharedKernel\Application\Exception;

use \estbase\SharedKernel\Domain\Exception\EntityNotFoundException as DomainEntityNotFoundException;

class EntityNotFoundException extends \Exception implements ApplicationException
{
    /**
     * @param string $message
     * @param DomainEntityNotFoundException $previous
     */
    public function __construct(string $message, DomainEntityNotFoundException $previous)
    {
        parent::__construct($message, null, $previous);
    }
}