<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/11/6
 * Time: 下午9:16
 */

namespace App\Http\Controllers\swoole\Controller;

class Test
{
    public static function test()
    {
        print_r(332);

        $host = '0.0.0.0';
        $port = 9501; // 1024 以下 需要 root 权限
        $model = 'SWOOLE_PROCESS';
        $soket_tye= 'SWOOLE_SOCK_TCP';
        $ser = new \swoole_server($host, $port);
        $ser->on('Connect', function ($request, $response) {
            echo '链接成功';
        });
    }
}
