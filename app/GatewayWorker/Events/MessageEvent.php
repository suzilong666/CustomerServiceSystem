<?php

namespace App\GatewayWorker\Events;

use \GatewayWorker\Lib\Gateway;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class MessageEvent
{
    public static function handle($clientId, $message)
    {
        $functionName = $message['type'];
        $data = $message['data'];
        if (method_exists(self::class, $functionName)) {
            self::$functionName($clientId, $data);
        }
    }

    public static function login($clientId, $data = [])
    {
        $token = auth()->validate($data);
        Gateway::sendToClient($clientId, json_encode(["type" => "login", "message" => "登录成功", "data" => $token]));
    }
}
