<?php

return [
    'commands' => [
        \Spark\Commands\SparkHelloCommand::class,
        \Spark\Framework\Wm\WebServeCommand::class,
        \Spark\Framework\Swoole\SwooleServerCommand::class,
    ],
    'wm' => [
        'host' => getenv('WM_HOST'),
        'port' => getenv('WM_PORT'),
        'count' => getenv('WM_COUNT'),
    ],
    'swoole_http_server' => [
        'name' => 'Swoole web server',
        'host' => getenv('SWOOLE_SERVER_HOST') ?: '0.0.0.0',
        'port' => getenv('SWOOLE_SERVER_PORT') ?: 8014,
        'worker_num' => getenv('SWOOLE_WORKER_NUM') ?: 1,
        'max_request' => getenv('SWOOLE_WORKER_MAX_REQUEST') ?: 1000,
        'package_max_length' => getenv('SWOOLE_PACKAGE_MAX_LENGTH') ?: 10485760,
    ],
    'base_path' => getenv('APP_BASE_PATH') ?: APP_PATH,
    'base_uri' => getenv('APP_BASE_URI') ?: 'http://{app.host}',
    'runtime_path' => APP_PATH . '/runtime',
];