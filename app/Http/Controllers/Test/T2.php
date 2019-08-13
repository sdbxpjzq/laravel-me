<?php


namespace App\Http\Controllers\Test;


class T2
{
    public static function indexT2()
    {
        echo "start curl\n";
        //popen函数，参数1执行php命令(PHP的路径 需要执行的php命令文件或其他shell命令)，参数2以只读方式执行命令
        $sFilePath = __DIR__.'/T1.php';
        pclose(popen("/usr/local/php/bin/php  {$sFilePath} &", 'r'));
        echo "end curl\n";
    }
}
