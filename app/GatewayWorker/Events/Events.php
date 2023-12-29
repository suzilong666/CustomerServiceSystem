<?php

namespace App\GatewayWorker\Events;

$GLOBALS['visitor'] = []; // 访客列表；visitorClientId => customerServiceClientId
$GLOBALS['customerService'] = []; // 客服列表 customerServiceClientId => [ visitorClientId ]

class Events
{
    public static function onWorkerStart($businessWorker)
    {
        echo "BusinessWorker Start\n";
    }

    // public static function onConnect($clientId)
    // {
    //     $GLOBALS['clientId'][$clientId] = null;
    // }

    public static function onWebSocketConnect($clientId, $data)
    {
        logger($data);
    }

    public static function onMessage($clientId, $message)
    {
        $message = json_decode($message, true);
        if (isset($message) && $message['type']) {
            MessageEvent::handle($clientId, $message);
        }
    }

    public static function onClose($clientId)
    {
        if (isset($GLOBALS['clientId'][$clientId])) {
        }
    }
}
