<?php
///**
// * Created by PhpStorm.
// * User: zongqi
// * Date: 2018/11/8
// * Time: 下午8:31
// */
//
//namespace App\Http\Controllers\Swoole\Server;
//
///**
// * 定时器
// * Class Timer
// * @package App\Http\Controllers\Swoole\Server
// */
//class Timer
//{
//
////swoole_timer_tick函数就相当于setInterval，是持续触发的
////swoole_timer_after函数相当于setTimeout，仅在约定的时间触发一次
////swoole_timer_tick和swoole_timer_after函数会返回一个整数，表示定时器的ID
////可以使用 swoole_timer_clear 清除此定时器，参数为定时器ID
//    public static function timer()
//    {
//        //每隔2000ms触发一次
//        swoole_timer_tick(2000, function ($timer_id) {
//            echo "tick-2000ms\n";
//        });
//
////3000ms后执行此函数
//        swoole_timer_after(3000, function () {
//            echo "after 3000ms.\n";
//        });
//
//    }
//}
