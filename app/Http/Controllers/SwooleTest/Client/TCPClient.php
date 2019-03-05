<?php
///**
// * Created by PhpStorm.
// * User: zongqi
// * Date: 2018/11/7
// * Time: 下午9:28
// */
//
//namespace App\Http\Controllers\Swoole\Client;
//
//
//class TCPClient
//{
//    public static function TCPClient()
//    {
//        $client = new swoole_client(SWOOLE_SOCK_TCP);
//        if (!$client->connect('127.0.0.1', 9501)) {
//            echo '连接失败';
//            exit;
//        }
//
//        fwrite(STDOUT, '请输入');
//        $msg = trim(fgets(STDIN));
//        // 发送给 server
//        $client->send($msg);
//        // 接受server 端数据
//        $ret = $client->recv();
//        echo $ret;
//    }
//}
//
//TCPClient::TCPClient();
