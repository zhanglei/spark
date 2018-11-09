<?php
/**
 * Created by PhpStorm.
 * User: wujunze
 * Date: 2018/11/9
 * Time: 10:36 AM
 */

namespace Spark\Commands;


use Spark\Framework\Command\BaseCommand;
use Spark\Framework\Interfaces\Di\ContainerInterface;
use Spark\Framework\WebServer\WMWebServer;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Workerman\Worker;

class WebServeCommand extends BaseCommand
{

    private $config;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);

        $this->config = $this->container->getByAlias('config');


    }

    public function configure()
    {
        $this->setName('spark:wm')
            ->setDescription('SparkPHP FrameWork PHP Server')
            ->addArgument(
                'subcommands',
                InputArgument::IS_ARRAY,
                '可选多个参数'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        global $argv;

        /* Original data like
        Array
        (
            [0] => worker.php
            [1] => start
            [3] => -d
            [4] => -g
        )
        */
        /* Console data like
        Array
        (
            [0] => spark
            [1] => spark:serve
            [2] => start
            [3] => d
            [4] => g
        )
        */

        // So redefine arguments
        if (isset($argv[2])) {
            $argv[1] = $argv[2];
            if (isset($argv[3])) {
                $argv[2] = "-{$argv[3]}";
                if (isset($argv[4])) {
                    $argv[3] = $argv[4];
                } else {
                    unset($argv[3]);
                }
            } else {
                unset($argv[2]);
            }
        }

        $web = new WMWebServer("http://{$this->config['app.wm.host']}:{$this->config['app.wm.port']}");
        $web->count = $this->config['app.wm.count'];
        $web->addRoot('spark.com', __DIR__.'/../../public');
        Worker::runAll();


    }

}