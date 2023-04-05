<?php

namespace Log;

class Log
{
    public static function sendLog(string $level, $message, array $context = []): void
    {
        $logger = new \Log\Logger();
        $logger->log($level, $message, $context);
    }
}