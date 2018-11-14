<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/11/7
 * Time: 下午3:22
 */

namespace App\Custom\Classes;


use Custom\Classes\MyRedis;

class RedisLock
{
    private static function oRedis()
    {
        return MyRedis::oInstance();
    }

    /**
     * 加锁
     * @param $key
     * @param $expTime
     * @return bool
     */
    public static function set($key, $expTime)
    {
        return self::oRedis()->set($key, time() ,['nx', 'ex' => $expTime]);
//        $isLock = self::oRedis()->setnx($key, time() + $expTime);
//        if ($isLock) {
//            return true;
//        } else {
//            //加锁失败的情况下。判断锁是否已经存在，如果锁存在切已经过期，那么删除锁。进行重新加锁
//
//            $val = self::oRedis()->get($key);
//
//            if ($val && $val < time()) {
//                self::oRedis()->del($key);
//            }
//            return self::oRedis()->setnx($key, time() + $expTime);
//        }
    }

    /**
     * 删除锁
     * @param $key
     */
    public static function del($key)
    {
        self::oRedis()->del($key);
    }


}
