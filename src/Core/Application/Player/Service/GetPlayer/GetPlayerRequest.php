<?php

namespace estbase\Core\Application\Player\Service\GetPlayer;

use estbase\SharedKernel\Application\UseCase\RequestInterface;

class GetPlayerRequest implements RequestInterface
{
    /** @var int */
    private $id;

    /**
     * @param int $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}