<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/11/6
 * Time: 下午12:37
 */

namespace App\Http\Controllers\Email\Controller;

use Custom\Classes\MySendEmail;

class Vpn
{
    private static $aUser = [
        // 安可
        '245783065@qq.com' => [
            'time' => '2019-06-10',
            'port' => 9090
        ], //9090
        // 欢欢
        '18410134386@163.com' => [
            'time' => '2019-03-14',
            'port' => 8987
        ],
        //
        'youchebuqi@163.com' => [
            'time' => '2019-11-05',
            'port' => 9091
        ],
        // 宋志超
//        '' => '2019-05-06' //9082
    ];


    public static function bSendVpnEmail()
    {
        $now = date('Y-m-d');
        foreach (self::$aUser as $sEmail => $aItem) {
            $diff = date_diff(date_create($now), date_create($aItem['time']));
            $iDays = intval($diff->format('%R%a'));
            if ($iDays <= 3) {
                $sToEmail = $sEmail;
                $sEmailTitle = 'VPN说明';
                $sEmailContent = 'VPN 使用还剩' . $iDays . '天, 请及时缴费';
                $mail = new MySendEmail('VPN',$sToEmail, $sEmailTitle, $sEmailContent);

                $sAdminEmail = '1165064143@qq.com';
                $sAdminTitle = 'VPN缴费通知';
                $sAdminContent = '端口'. $aItem['port'] . '需要缴费了.'. '邮箱: '. $sEmail;
                $mail = new MySendEmail('VPN',$sAdminEmail, $sAdminTitle, $sEmailContent);
            }
        }
    }

}
