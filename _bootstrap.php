<?php

declare(strict_types=1);

date_default_timezone_set('Europe/Moscow');

require_once __DIR__ . '/' . 'vendor/autoload.php';

use Dotenv\Dotenv;

$dotEnv = Dotenv::createUnsafeImmutable(__DIR__);
$env = $dotEnv->load();

