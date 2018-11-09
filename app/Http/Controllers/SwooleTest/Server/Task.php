<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/11/8
 * Time: 下午1:12
 */

namespace App\Http\Controllers\Swoole\Server;


class Task
{
    public static function task()
    {
        $serv = new \swoole_server("127.0.0.1", 9502);

//设置异步任务的工作进程数量
        $serv->set(array('task_worker_num' => 4));

        $serv->on('receive', function(\swoole_server $serv, $fd, $from_id, $data) {
            //投递异步任务
            $task_id = $serv->task($data);
//            echo "Dispath AsyncTask: id=$task_id\n";
        });

//处理异步任务
        $serv->on('task', function ($serv, $task_id, $from_id, $data) {
            echo "New AsyncTask[id=$task_id]".PHP_EOL;
            //返回任务执行的结果
            $serv->finish("$data -> OK");
        });

//处理异步任务的结果
        $serv->on('finish', function ($serv, $task_id, $data) {
            echo "AsyncTask[$task_id] Finish: $data".PHP_EOL;
        });

        $serv->start();

    }
}
Task::task();
