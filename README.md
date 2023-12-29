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
{"type":"login","data":{"username":"suzilong","password":"123456"}}
{"type":"login","data":{"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTcwMzQ5MzE0MywiZXhwIjoxNzAzNDk2NzQzLCJuYmYiOjE3MDM0OTMxNDMsImp0aSI6IjBmMG5MNGNOb0JCZWtWNTEiLCJzdWIiOjExMCwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.xFARLJOttWYv0sQC02M8s20yS4uDgXAoPT71zXJ0eEw"}}
```

生成模型
```
php artisan make:model User --migration

php artisan migrate
php artisan migrate:rollback
```