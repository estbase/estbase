<?php

namespace estbase\Core\Application\Player\Service\GetPlayer;

use estbase\SharedKernel\Application\UseCase\RequestInterface;
use estbase\SharedKernel\Application\UseCase\ResponseInterface;
use estbase\SharedKernel\Application\UseCase\UseCase;

class GetPlayerUseCase extends UseCase
{
    private $playerDataService;

    public function __construct(
        GetPlayerDataService $playerDataService
    )
    {
        $this->playerDataService = $playerDataService;
    }
    /**
     * @param RequestInterface $request
     * @return ResponseInterface|void
     */
    protected function doExecute(RequestInterface $request)
    {
        // TODO: Implement doExecute() method.
    }
}