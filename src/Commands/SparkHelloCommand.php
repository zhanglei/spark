<?php
/**
 * Created by PhpStorm.
 * User: wujunze
 * Date: 2018/11/5
 * Time: 6:49 PM
 */

namespace Spark\Commands;


use Spark\Framework\Command\BaseCommand;
use Spark\Framework\Interfaces\Di\ContainerInterface;
use Spark\Modules\Common\CommonService;
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