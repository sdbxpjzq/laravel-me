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
        '245783065@qq.com' => [
            'time' => '2019-06-10',
            'port' => 9090,
            'name' => '安可',
            'price' => 100,
        ],
        '18410134386@163.com' => [
            'time' => '2019-03-14',
            'port' => 8987,
            'name' => '杨欢',
            'price' => 100,
        ],
        'youchebuqi@163.com' => [
            'time' => '2019-11-05',
            'port' => 9091,
            'name' => '徐志伟',
            'price' => 120,
        ],
        '992331527@qq.com' => [
            'time' => '2019-05-06',
            'port' => 9082,
            'name' => '宋志超',
            'price' => 60,
        ],
        '1158540728@qq.com' => [
            'time' => '2019-11-09',
            'port' => 9083,
            'name' => '付泽波',
            'price' => 120,
        ],
    ];


    public static function bSendVpnEmail()
    {
        $aRet = [];
        $sAdminEmail = '1165064143@qq.com';
        $now = date('Y-m-d');
        foreach (self::$aUser as $sEmail => $aItem) {
            $diff = date_diff(date_create($now), date_create($aItem['time']));
            $iDays = intval($diff->format('%R%a'));
            $aRet[$aItem['name']] = $iDays;
            if ($iDays <= 3) {
                $sEmailTitle = 'VPN说明';
                $sEmailContent = 'VPN 使用还剩' . $iDays . '天, 请及时缴费';
                MySendEmail::bSend('VPN', $sEmail, $sEmailTitle, $sEmailContent);

                $sAdminTitle = 'VPN缴费通知';
                $sAdminContent = $aItem['name'] . '需要缴费了. 端口' . $aItem['port'] . ',邮箱: ' . $sEmail;
                MySendEmail::bSend('VPN', $sAdminEmail, $sAdminTitle, $sAdminContent);
            }
        }

        $sAdminTitle = 'VPN';
        $sAdminContent = '';
        foreach ($aRet as $name => $days) {
            $sAdminContent .= $name . '--还剩--' . $days .'天' . PHP_EOL;
        }
        MySendEmail::bSend('VPN', $sAdminEmail, $sAdminTitle, $sAdminContent);
    }

}
