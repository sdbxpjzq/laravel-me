<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/10/28
 * Time: 下午9:25
 */

namespace Custom\Classes;


class MyRedis
{
    /**
     *  单例模式:  三私一公
     */

    private static $oInstance = null;
    public static function oInstance()
    {
        if (!self::$oInstance) {
            self::$oInstance = new self();
        }
        return self::$oInstance;
    }

    //私有化构造方法，禁止外部实例化对象
    private function __construct(){
        $redis = (new \Redis);
        $redis->connect('127.0.0.1');
        return $redis;
    }


    // 私有化__clone，防止对象被克隆
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }




}
