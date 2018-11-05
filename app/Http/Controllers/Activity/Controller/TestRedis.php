<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/11/3
 * Time: 下午1:04
 */

namespace App\Http\Controllers\Activity\Controller;


use Custom\Classes\MyRedis;

class TestRedis
{
    private static function oRedis()
    {
        return MyRedis::oInstance();
    }

    
    // redis 事务
    public static function multi()
    {
        $redis = self::oRedis();
        $handle = $redis->multi();
        $handle->incr('a');
        $handle->incr('b');
        $handle->exec();

    }

    public static function pipline()
    {

        $redis = self::oRedis();
        $redis->set('a',1);
        $redis->set('b',1);
        $handle = $redis->pipeline();
        $handle->incr('a');
        $handle->incr('b');
        $handle->exec();
    }

    public static function get()
    {
        $a = self::oRedis()->get('a');
        var_dump($a);

    }

}