<?php
/**
 * This file is part of Spark Framework.
 *
 * @link     https://github.com/spark-php/framework
 * @document https://github.com/spark-php/framework
 * @contact  itwujunze@gmail.com
 * @license  https://github.com/spark-php/framework
 */

namespace Spark\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Spark\Framework\Controller\BaseController;

class SparkController extends BaseController
{
    public function index(ServerRequestInterface $request, ResponseInterface $response)
    {
        return $response->withJson(['hello', 'world']);
    }

    public function spark(ServerRequestInterface $request, ResponseInterface $response)
    {
        return $response->withJson(['hello', 'spark']);
    }
}
