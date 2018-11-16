<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/11/16
 * Time: 下午4:41
 */

namespace App\Http\Controllers\Email\Controller;


trait Tools
{
    protected function iRemainDays(string $day): int
    {
        $nowDay = date('Y-m-d');
        $diff = date_diff(date_create($nowDay), date_create($day));
        $days = $diff->format('%R%a');
        return $days < 0 ? abs($days) : $days;
    }
}
