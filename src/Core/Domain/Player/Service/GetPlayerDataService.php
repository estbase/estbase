<?php

namespace estbase\Core\Domain\Player\Service;

use estbase\Core\Domain\Player\Repository\PlayerRepository;
use estbase\SharedKernel\Domain\ValueObject\EntityId;

class GetPlayerDataService
{
    private $playerRepository;

    public function __construct(PlayerRepository $playerRepository)
    {
        $this->playerRepository = $playerRepository;
    }

    /**
     * @param EntityId $entityId
     * @return mixed
     */
    public function get(EntityId $entityId)
    {
        // Comprobar abans que rebo un EntityId, que no es NULL, si no, trhow in o fagi res.
        return $this->playerRepository->find($entityId->getValue());
    }
}