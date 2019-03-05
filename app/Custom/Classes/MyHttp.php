<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/11/15
 * Time: 下午8:01
 */

namespace Custom\Classes;


class MyHttp
{
    public static function vGet(string $host, int $port, string $path, array $param)
    {

        $fp = fsockopen($host,
            $port, $errmo, $errstr, 10);
        if (!$fp) {
            exit($errstr);
        }
//
//HTTP报文
//
//请求行  请求头  请求体
//
        $http = '';
//请求行
        $param = serialize($param);
        $http .= "GET {$path} HTTP/1.1\r\n"; //必须添加 \r\n
//
// 请求头
        $http .= "Host: {$host}\r\n";
//$http .= "Content-type: application/x-www-form-urlencoded";
        $http .= "Connection: close\r\n\r\n"; // 在请求头 和 请求体 之间添加2个 \r\n
//
// 请求体
        $http .= "";
//
        $a = fwrite($fp, $http);
//
// 获取结果
//
        $res = '';
        while (!feof($fp)) {
            $res .= fgets($fp);
        }
//
        fclose($fp);
        print_r($res);
        echo $res;
    }
}
