添加依赖
```
"workerman/gateway-worker": "^3.0",
"workerman/gatewayclient": "^3.0",
"workerman/workerman": "^3.5"
```

执行命令启动gatewayWorker
```
php artisan register-worker:start
php artisan gateway-worker:start
php artisan business-worker:start
```

ws发生的数据数据
```
{"type":"login","data":{"username":"susu","password":"123456"}}
```