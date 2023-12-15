<?php

namespace App\GatewayWorker\Commands;

use Illuminate\Console\Command;

use \Workerman\Worker;
use \GatewayWorker\Gateway;

class StartGatewayWorker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gateway-worker:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'gateway worker start';

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
        // gateway 进程
        $gateway = new Gateway(env('GATEWAY_WORKER_ADDRESS'));
        // 设置名称，方便status时查看
        $gateway->name = 'gateway';
        // 设置进程数，一般两个进程就足够
        $gateway->count = 2;
        // 分布式部署时请设置成内网ip（非127.0.0.1）
        $gateway->lanIp = '127.0.0.1';
        // 内部通讯起始端口。假如$gateway->count=2，起始端口为2300
        // 则一般会使用2300 2301 2个端口作为内部通讯端口
        $gateway->startPort = 2300;
        // 心跳间隔
        $gateway->pingInterval = 10;
        // 心跳数据
        $gateway->pingData = '{"type":"ping"}';
        // 服务注册地址
        $gateway->registerAddress = env('REGISTER_ADDRESS');

        if (!defined('GLOBAL_START')) {
            Worker::runAll();
        }
    }
}
