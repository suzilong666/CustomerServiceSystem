<?php

namespace App\GatewayWorker\Commands;

use Illuminate\Console\Command;


use Workerman\Worker;
use GatewayWorker\Register;

class StartRegisterWorker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'register-worker:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'register worker start';

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
        new Register('Text://' . env('REGISTER_ADDRESS'));
        if (!defined('GLOBAL_START')) {
            Worker::runAll();
        }
    }
}
