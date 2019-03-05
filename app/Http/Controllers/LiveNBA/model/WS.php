<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/11/10
 * Time: 上午9:20
 */

namespace App\Http\Controllers\LiveNBA\model;


use Custom\Classes\MyRedis;
use SwooleTW\Http\Websocket\Facades\Websocket;

class WS
{

    private static function oRedis()
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1');
        return $redis;
    }

    public static function indexV2()
    {
//        Websocket::on('open', [__CLASS__, 'onOpen']);
//        Websocket::on('close', [__CLASS__, 'onClose']);
//        Websocket::on('message', function (\swoole_websocket_server $ws,\swoole_websocket_frame $frame) {
//            echo "Message: {$frame->data}\n";
//            $ws->push($frame->fd, "server: {$frame->data}");
//        });

    }



    public static function index($message = '')
    {
        //创建websocket服务器对象，监听0.0.0.0:9502端口
        $ws = new \swoole_websocket_server("0.0.0.0", 1215);

//监听WebSocket连接打开事件
        $ws->on('open', [__CLASS__, 'onOpen']);
//监听WebSocket消息事件
        $ws->on('message', function (\swoole_websocket_server $ws,\swoole_websocket_frame $frame) {
            echo "Message: {$frame->data}\n";
            $ws->push($frame->fd, "server: {$frame->data}");
        });

//监听WebSocket连接关闭事件
        $ws->on('close', [__CLASS__, 'onClose']);
        $ws->start();
    }

    // 必须是publick 方法
    public static function onOpen(\swoole_websocket_server $ws, \swoole_http_request $request)
    {
        // 记录fd
        $ret = self::oRedis()->sAdd('zongqi:liveNBA:Fd', $request->fd);
        $ws->push($request->fd, "hello, welcome {$ret}\n");
    }

    public static function onClose(\swoole_websocket_server $ws, $fd)
    {
        // 关闭时删除fd
        $ret = self::oRedis()->sRem('zongqi:liveNBA:Fd', $fd);
    }




//    ========================== ==============

}
