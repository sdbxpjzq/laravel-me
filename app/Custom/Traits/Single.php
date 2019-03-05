<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018-12-11
 * Time: 16:59
 */

namespace Custom\Traits;


// 单例模式（口诀：三私一公）
class Singleton{
    //私有化构造方法，禁止外部实例化对象
    final private function __construct(){}
    //私有化__clone，防止对象被克隆
    final private function __clone(){}
    //私有化内部实例化的对象
    private static $instance = null;
    // 公有静态实例方法
    final public static function getInstance(){
        if(self::$instance == null){
            //内部实例化对象
            self::$instance = new self();
        }
        return self::$instance;
    }
}
