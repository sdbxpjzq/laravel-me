<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/10/28
 * Time: 下午7:02
 */

namespace App\Http\Controllers\Activity\Controller;

use Custom\Classes\MLS;
use Custom\Classes\MyRedis;

/**
 * 签到统计
 * Class QianDaoTongJi
 * @package App\Http\Controllers\Activity\Controller
 */
class QianDaoTongJi
{
    public static function oSign()
    {
        $oRedis = MyRedis::oInstance();
        $oRedis->set('name','zongqi');
        $name1 = $oRedis->get('name');
        $name2 = $oRedis->get('name22');
        dd($name1, $name2);
    }
}