<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/10/28
 * Time: 下午7:02
 */

namespace App\Http\Controllers\Activity\Controller;

use Custom\Classes\MyRedis;
use phpDocumentor\Reflection\Types\Self_;

/**
 * 签到统计
 * Class QianDaoTongJi
 * @package App\Http\Controllers\Activity\Controller
 */
class QianDaoTongJi
{
    private static $sRediskey = 'activity:qiandao:time:';
    private static $sIncrKey = 'activity:qiandao:incr:';

    private static function oRedis()
    {
        return MyRedis::oInstance();
    }

    private static function sGetRedisKey($iUid)
    {
        $self::oRedis()->get(self::$sIncrKey . $iUid);

    }

    // 设置签到
    public static function bSetQianDao($iUid, $iState = 0, $sTime = '')
    {
        $iOffset = $sTime ? strtotime($sTime) : strtotime(date('Y-m-d'));
        return self::oRedis()->setBit(self::$sRediskey . $iUid, $iOffset, $iState);
    }


    // 获取签到信息
    public static function aGetQandao($iUid, $sTime = '')
    {
        $iOffset = $sTime ? strtotime($sTime) : strtotime(date('Y-m-d'));
        return self::oRedis()->getBit(self::$sRediskey . $iUid, $iOffset);
    }


    // 是否是 4天连续签到
    public static function aContinuousFourDays($iUid)
    {
        $date = date('Y-m-d');
        for ($i = 1; $i <= 4; $i++) {
            $iOffset = strtotime($date . " -{$i} day");
            $aRet[] = self::oRedis()->getBit(self::$sRediskey . $iUid, $iOffset);
        }
        if (in_array(0, $aRet)) {
            return [
                'flag' => false
            ];
        }
        self::oRedis()->incr(self::$sIncrKey . $iUid);
        return [
            'flag' => true
        ];
//        self::oRedis()->bitOp();
//        self::oRedis()->bitpos();
    }


}
