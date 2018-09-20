<?php

namespace estbase\SharedKernel\Application\Service\Logger;

use Psr\Log\LogLevel as PsrLogLevel;

class LogLevel extends PsrLogLevel
{
    const LEVELS_AVAILABLE = [
        self::EMERGENCY,
        self::ALERT,
        self::CRITICAL,
        self::ERROR,
        self::WARNING,
        self::NOTICE,
        self::INFO,
        self::DEBUG
    ];
}