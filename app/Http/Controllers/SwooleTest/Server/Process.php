<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/11/9
 * Time: 上午6:46
 */

namespace App\Http\Controllers\Swoole\Server;


class Process
{
    public static function process()
    {
        // 开启子进程
        $process = new \swoole_process('callback_function', true);

        $pid = $process->start();

        function callback_function(\swoole_process $worker)
        {
            // 子进程执行
            $worker->exec('/usr/local/bin/php', array(__DIR__.'/swoole_server.php'));
        }

        \swoole_process::wait();
    }


    public static function moreProcess()
    {
        $aUrl = [
            'https://baidu.com',
            'https://blog.zongqilive.cn',
            'https://sina.com.cn',
        ];
    }
}
