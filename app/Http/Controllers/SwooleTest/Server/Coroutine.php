<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/11/9
 * Time: 下午4:52
 */

namespace App\Http\Controllers\SwooleTest\Server;


class Coroutine
{
    // 异步代码  同步写法
    public static function Coroutine()
    {
        $http = new \swoole_http_server("0.0.0.0", 8811);
        $http->on('request', function ($req, $res ) {
            $value = '';
            go(function () use (&$value) {
                $redis = new \Redis;
                $retval = $redis->connect("127.0.0.1", 6379);
                $redis->set("key1", "value1");
                $value = $redis->get("key1");
//                $redis->close();
            });
            $res->end($value);
        });
        $http->start();



//        go(function () {
//            \co::sleep(5);
//            echo "hello go1 \n";
//        });
//
//        echo "hello main \n";
//
//        go(function () {
//            echo "hello go2 \n";
//        });


    }
}
Coroutine::Coroutine();
