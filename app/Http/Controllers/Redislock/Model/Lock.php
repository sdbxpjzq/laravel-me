<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/11/5
 * Time: 下午5:51
 */

namespace App\Http\Controllers\Redislock\Model;


use App\Custom\Classes\RedisLock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lock extends Model
{
    private static $storage = 'storage';
    private static $order = 'order';
    private static $lockKey = 'testloclk11';

    // 查询库存
    public static function storage()
    {
        // 加锁
        $lock = RedisLock::set(self::$lockKey, 3);
        var_dump($lock);
        if ($lock) {
            $aKuCun = DB::table(self::$storage)->where([
                ['id', '=', 1]
            ])->limit(1)->get();
            $aKuCun = $aKuCun->get(0);
            $number = $aKuCun->number;
            if ($number > 0) {
                self::saveOrder($number);
            }
        }
    }

    // 写订单
    public static function saveOrder($number)
    {
        // 先消耗资源 在做其他的事情
        $num = DB::table(self::$storage)->where([
            ['id', '=', 1]
        ])->decrement('number', 1);
        if ($num) {
            // 扣减成功  去下单
            $id = DB::table(self::$order)->insertGetId(['number' => $number]);
            if(!$id) {
                //下单失败 补偿
                $num = DB::table(self::$storage)->where([
                    ['id', '=', 1]
                ])->increment('number', 1);
            }
            RedisLock::del(self::$lockKey);
            var_dump('成功');
        }
    }
}
