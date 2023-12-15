添加依赖
"workerman/gateway-worker": "^3.0",
"workerman/gatewayclient": "^3.0",
"workerman/workerman": "^3.5"


创建一个启动websocket服务的命令类
php artisan make:command RegisterWorker
php artisan make:command GatewayWorker
php artisan make:command BusinessWorker

执行命令启动gatewayWorker
```
php artisan register-worker:start
php artisan gateway-worker:start
php artisan business-worker:start
```