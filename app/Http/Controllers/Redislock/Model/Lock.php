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
    private static $lockKey = 'testloclk';

    // 查询库存
    public static function storage()
    {
        $lock = RedisLock::set(self::$lockKey, 10);
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
        $id = DB::table(self::$order)->insertGetId(['number' => $number]);
        if ($id) {
            $aKuCun = DB::table(self::$storage)->where([
                ['id', '=', 1]
            ])->decrement('number', 1);
            RedisLock::del(self::$lockKey);
            var_dump('扣减成功' . $aKuCun);
        }
    }
}
