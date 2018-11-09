<?php
/**
 * This file is part of Spark Framework.
 *
 * @link     https://github.com/spark-php/framework
 * @document https://github.com/spark-php/framework
 * @contact  itwujunze@gmail.com
 * @license  https://github.com/spark-php/framework
 */

namespace Spark\Commands;

use Spark\Framework\Command\BaseCommand;
use Spark\Framework\Interfaces\Di\ContainerInterface;
use Spark\Modules\Common\Services\CommonService;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SparkHelloCommand extends BaseCommand
{
    private $commonService;

    public function __construct(ContainerInterface $container, CommonService $commonService)
    {
        $this->commonService = $commonService;

        parent::__construct($container);
    }

    protected function configure()
    {
        $this->setName('spark:hello')
            ->setDescription('SparkPHP FrameWork Demo');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(getenv('APP_NAME'));
        $output->write($this->commonService->spark(), true);
    }
}
