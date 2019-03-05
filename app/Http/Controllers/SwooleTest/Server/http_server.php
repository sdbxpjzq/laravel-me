<?php
///**
// * Created by PhpStorm.
// * User: zongqi
// * Date: 2018/11/8
// * Time: 上午5:56
// */
//
//namespace App\Http\Controllers\Swoole\Server;
//
//
//class http_server
//{
//    public static function http()
//    {
//
//        $http = new \swoole_http_server("0.0.0.0", 8811);
//        $http->set([
////            设置document_root并设置enable_static_handler为true后，
////底层收到Http请求会先判断document_root路径下是否存在此文件，
////如果存在会直接发送文件内容给客户端，不再触发onRequest回调。
//            'document_root' => '/data/wwwroot/laravel/app/Http/Controllers/Swoole/Data',
//            'enable_static_handler' => true,
//        ]);
//        $http->on('request', function (\swoole_http_request $request, \swoole_http_response $response) {
//            // 发送给浏览器
//            print_r($request->get);
//            $response->end("<h1>Hello Swoole. #".mt_rand(1000, 9999)."</h1>");
//        });
//
//        $http->start();
//    }
//}
//http_server::http();
