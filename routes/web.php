<?php
/**
 * This file is part of Spark Framework.
 *
 * @link     https://github.com/spark-php/framework
 * @document https://github.com/spark-php/framework
 * @contact  itwujunze@gmail.com
 * @license  https://github.com/spark-php/framework
 */

return function (\Spark\Framework\Interfaces\Router\RouterInterface $router) {
    $router->addRoute(
        (new \Spark\Framework\Router\Route())
            ->get('/')
            ->setTarget([\Spark\Controllers\SparkController::class, 'index'])
    );

    $router->addRoute(
        (new \Spark\Framework\Router\Route())
            ->get('/spark')
            ->setTarget([\Spark\Controllers\SparkController::class, 'spark'])
    );
};
