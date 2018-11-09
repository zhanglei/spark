<?php

return [
    'commands' => [
        \Spark\Commands\SparkHelloCommand::class,
        \Spark\Commands\WebServeCommand::class,
    ],
    'wm' => [
        'host' => getenv('WM_HOST'),
        'port' => getenv('WM_PORT'),
        'count' => getenv('WM_COUNT'),
    ]
];