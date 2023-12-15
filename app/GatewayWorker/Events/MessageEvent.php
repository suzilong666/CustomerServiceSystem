<?php

namespace App\GatewayWorker\Events;

use \GatewayWorker\Lib\Gateway;

class MessageEvent
{
    public static function handle($client_id, $message)
    {
        $functionName = $message['type'];
        $data = $message['data'] || [];
        if (method_exists(self::class, $functionName)) {
            self::$functionName($client_id, $data);
        }
    }

    public static function login($client_id, $data = [])
    {
        Gateway::sendToClient($client_id, json_encode(["type" => "login", "message" => "登录成功"]));
    }
}
