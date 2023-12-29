<?php

namespace App\GatewayWorker\Events;

use \GatewayWorker\Lib\Gateway;
use Tymon\JWTAuth\Token;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class MessageEvent
{
    public static $customerService = [];


    public static function handle($clientId, $message)
    {
        $functionName = $message['type'];
        $data = $message['data'];
        if (method_exists(self::class, $functionName)) {
            self::$functionName($clientId, $data);
        }
    }

    public static function test($clientId, $message)
    {
        
    }

    public static function login($clientId, $data = [])
    {
        $token = $data['token']; // 从 WebSocket 消息中获取 token 字符串
        try {
            $decodedToken = JWTAuth::decode(new Token($token)); // 解码 token
            $userID = $decodedToken["sub"];
            // 根据解码后的 token 进行验证和其他逻辑处理
            self::$customerService[$clientId] = $userID;
            // 验证成功后的操作...
            Gateway::sendToClient($clientId, json_encode(["type" => "login", "message" => "登录成功"]));
        } catch (JWTException $e) {
            // 校验失败的处理...
            Gateway::sendToClient($clientId, json_encode(["type" => "login", "message" => "登录失败", "data" => $e]));
        }
    }
}
