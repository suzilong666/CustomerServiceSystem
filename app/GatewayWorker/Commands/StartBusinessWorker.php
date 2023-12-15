<?php

namespace App\GatewayWorker\Commands;

use Illuminate\Console\Command;

use \Workerman\Worker;
use \GatewayWorker\BusinessWorker;

class StartBusinessWorker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'business-worker:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'business worker start';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // bussinessWorker 进程
        $worker = new BusinessWorker();
        // worker名称
        $worker->name = 'BusinessWorker';
        // bussinessWorker进程数量
        $worker->count = 1;
        // 服务注册地址
        $worker->registerAddress = env('REGISTER_ADDRESS');
        $worker->eventHandler    = \App\GatewayWorker\Events\Events::class;

        // 如果不是在根目录启动，则运行runAll方法
        if (!defined('GLOBAL_START')) {
            Worker::runAll();
        }
    }
}
