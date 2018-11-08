<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/11/7
 * Time: 下午8:24
 */

namespace App\Http\Controllers\Swoole\Server;


class TCP
{
    public static function TCP()
    {
        //创建Server对象，监听 127.0.0.1:9501端口
        $serv = new \swoole_server("127.0.0.1", 9501);

        $serv->set([
            'worker_num' => 4,    //worker process num
            'max_request' => 50,
        ]);

//监听连接进入事件
//        $fd 客户端连接唯一标识
//$reactor_id  线程ID
        $serv->on('connect', function ($serv, $fd, $reactor_id) {
            echo "Client:{{$reactor_id}}--{{$fd}}-- Connect.\n";
        });

//监听数据接收事件
        $serv->on('receive', function ($serv, $fd, $from_id, $data) {
            $serv->send($fd, $fd."--Server--" . $data);
        });

//监听连接关闭事件
        $serv->on('close', function ($serv, $fd) {
            echo "Client: Close.\n";
        });

//启动服务器
        $serv->start();
    }
}
TCP::TCP();
