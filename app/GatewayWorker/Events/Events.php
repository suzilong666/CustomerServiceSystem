<?php

namespace App\GatewayWorker\Events;

class Events
{

    public static function onWorkerStart($businessWorker)
    {
        echo "BusinessWorker Start\n";
    }

    public static function onConnect($client_id)
    {
        echo "BusinessWorker onConnect, client_id:" . $client_id . "\n";
    }

    public static function onWebSocketConnect($client_id, $data)
    {
        echo "BusinessWorker onWebSocketConnect, client_id:" . $client_id . "\n";
    }

    public static function onMessage($client_id, $message)
    {
        $message = json_decode($message, true);
        if (isset($message) && $message['type']) {
            MessageEvent::handle($client_id, $message);
        }
    }

    public static function onClose($client_id)
    {
        echo "BusinessWorker onClose, client_id:" . $client_id . "\n";
    }
}
