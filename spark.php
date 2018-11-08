#!/usr/bin/env php
<?php

ini_set('memory_limit', -1);
ini_set('display_errors', 'on');
ini_set('default_socket_timeout', -1);
date_default_timezone_set('Asia/Shanghai');

define('APP_PATH', realpath(__DIR__));

require APP_PATH.'/vendor/autoload.php';

if (file_exists(APP_PATH.'/.env')) {
    (new \Dotenv\Dotenv(__DIR__))->load();
}
$bootstrap = require APP_PATH.'/bootstrap/bootstrap.php';

$app = new \Spark\Framework\Application($bootstrap);

$app->loadConfig(APP_PATH . '/config/')
    ->bootstrap()
    ->get(\Symfony\Component\Console\Application::class)
    ->run();