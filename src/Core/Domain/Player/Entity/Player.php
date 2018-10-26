<?php

namespace estbase\Core\Domain\Player\Entity;

use estbase\SharedKernel\Domain\Entity\AggregateRoot;
use estbase\SharedKernel\Domain\Entity\EntityInterface;
use estbase\SharedKernel\Domain\ValueObject\EntityId;
use estbase\SharedKernel\Domain\ValueObject\Uuid;

class Player extends AggregateRoot implements EntityInterface
{
    /** @var Uuid */
    private $id;

    /** @var string */
    private $email;

    /** @var string */
    private $nickName;

    /** @var int */
    private $nickNameHash;

    /**
     * @param Uuid $id
     * @param string $email
     * @param string $nickName
     * @param int $nickNameHash
     */
    public function __construct(Uuid $id, string $email, string $nickName, int $nickNameHash)
    {
        $this->id = $id;
        $this->email = $email;
        $this->nickName = $nickName;
        $this->nickNameHash = $nickNameHash;
    }

    /**
     * @return EntityId
     */
    public function getId(): EntityId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getNickName(): string
    {
        return $this->nickName;
    }

    /**
     * @return int
     */
    public function getNickNameHash(): int
    {
        return $this->nickNameHash;
    }
}
