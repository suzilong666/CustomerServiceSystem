<?php

namespace App\GatewayWorker\Events;

class Events
{

    public static function onWorkerStart($businessWorker)
    {
        echo "BusinessWorker Start\n";
    }

    public static function onConnect($clientId)
    {
        echo "BusinessWorker onConnect, clientId:" . $clientId . "\n";
    }

    public static function onWebSocketConnect($clientId, $data)
    {
        echo "BusinessWorker onWebSocketConnect, clientId:" . $clientId . "\n";
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
        echo "BusinessWorker onClose, clientId:" . $clientId . "\n";
    }
}
