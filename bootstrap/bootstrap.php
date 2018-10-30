<?php
/**
 * This file is part of Spark Framework.
 *
 * @link     https://github.com/spark-php/framework
 * @document https://github.com/spark-php/framework
 * @contact  itwujunze@gmail.com
 * @license  https://github.com/spark-php/framework
 */

return function (\Spark\Framework\Interfaces\Di\ContainerInterface $container) {
    $container->enableAutowiredForNamespace('Spark');
};
