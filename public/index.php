<?php

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists($file = __DIR__.'/'.$uri)) {
    return false;
}
date_default_timezone_set('Asia/Shanghai');

define('APP_PATH', realpath(__DIR__.'/..'));

require APP_PATH.'/vendor/autoload.php';

if (file_exists(APP_PATH.'/.env')) {
    (new \Dotenv\Dotenv(APP_PATH))->load();
}

$bootstrap = require APP_PATH.'/bootstrap/bootstrap.php';
$routes = require APP_PATH.'/routes/web.php';

$app = new \Spark\Framework\Application($bootstrap);

// Register routes
$app->loadRouterConfig($routes);

// Run app
$app->run();