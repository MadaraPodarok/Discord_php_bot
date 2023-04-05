<?php

namespace Log;

use Monolog\Formatter\LogstashFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger as MonologLogger;
use Psr\Log\InvalidArgumentException;
use Psr\Log\LoggerInterface;
use RuntimeException;

class Logger implements LoggerInterface
{
    /**
     * @var MonologLogger
     */
    private MonologLogger $logger;

    /**
     * Директория логов
     * @var string
     */
    private string $logPath;

    /**
     * The Log levels.
     *
     * @var array
     */
    protected array $levels = [
        'debug' => MonologLogger::DEBUG,
        'info' => MonologLogger::INFO,
        'notice' => MonologLogger::NOTICE,
        'warning' => MonologLogger::WARNING,
        'error' => MonologLogger::ERROR,
        'critical' => MonologLogger::CRITICAL,
        'alert' => MonologLogger::ALERT,
        'emergency' => MonologLogger::EMERGENCY,
    ];

    /**
     * Parse the string level into a Monolog constant.
     *
     * @param array $config
     * @return int
     *
     * @throws InvalidArgumentException
     */
    private function level(array $config): int
    {
        $level = $config['level'] ?? 'debug';

        if (isset($this->levels[$level])) {
            return $this->levels[$level];
        }

        throw new InvalidArgumentException('Invalid log level.');
    }

    private function writeLog(string $level, string $message, array $context = []): void
    {
        $formatter = new LogstashFormatter('DiscordLog');
        $record = [
            'level_name' => $level,
            'level' => $this->level(['level' => $level]),
            'channel' => 'daily',
            'message' => $message,
            'context' => $context
        ];
        $formatter->format($record);
        $logFileDaily = $level . '-' . date("Y-m-d");
        $handler = new StreamHandler($this->logPath . "/$logFileDaily.log", $this->level(['level' => $level]));
        $handler->setFormatter($formatter);

        $this->logger->pushHandler($handler);
        $this->logger->$level($message, $context);
    }

    public function __construct()
    {
        $this->logPath = __DIR__ . '/../logs';
        if (!is_dir($this->logPath)
            && !mkdir($concurrentDirectory = $this->logPath)
            && !is_dir($concurrentDirectory)) {
            throw new RuntimeException('Невозможно создать директорию для хранения логов logs');
        }
        $this->logger = new MonologLogger('DiscordLog');
    }

    public function log($level, $message, array $context = []): void
    {
        $this->writeLog($level, $message, $context);
    }

    public function info($message, array $context = []): void
    {
        $this->writeLog('info', $message, $context);
    }

    public function error($message, array $context = []): void
    {
        $this->writeLog('error', $message, $context);
    }

    public function warning($message, array $context = []): void
    {
        $this->writeLog('warning', $message, $context);
    }

    public function critical($message, array $context = []): void
    {
        $this->writeLog('critical', $message, $context);
    }

    public function emergency($message, array $context = []): void
    {
        $this->writeLog('emergency', $message, $context);
    }

    public function alert($message, array $context = []): void
    {
        $this->writeLog('alert', $message, $context);
    }

    public function notice($message, array $context = []): void
    {
        $this->writeLog('notice', $message, $context);
    }

    public function debug($message, array $context = []): void
    {
        $this->writeLog('debug', $message, $context);
    }
}
