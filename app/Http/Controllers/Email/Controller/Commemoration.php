<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/11/16
 * Time: 下午4:11
 */

namespace App\Http\Controllers\Email\Controller;

use Custom\Classes\MySendEmail;

/**
 * 纪念日
 * Class Commemoration
 * @package App\Http\Controllers\Email\Controller
 */
class Commemoration implements SendInterface
{
    use Tools;
    private $sEmailContent = '';
    public function send()
    {
        // 登记
        $this->dengJiDays();

    }

    /**
     * 登记
     */
    private function dengJiDays()
    {
        $aInfo = [
            [
                'fromName' => '纪念日',
                'toEmail' => [
                    '735751955@qq.com',
                    '1165064143@qq.com'
                ],
                'emailTitle' => '纪念日',
                'day' => '2018-11-16',
                'text' => '今天是登录记后的第x天'
            ]
        ];
        foreach ($aInfo as $item) {

            $count = 0;
            $nowDay = date('Y-m-d');
            while (true) {
                $count++;
                $willDay = date('Y-m-d', strtotime($item['day'] . " +{$count} year"));
                if ($nowDay <= $willDay) {
                    $iDays1 = $this->iRemainDays($willDay);
                    break;
                }
            }

            $iDays2 = $this->iRemainDays($item['day']);
            $this->sEmailContent = str_replace('x', $iDays2, $item['text']);
            if ($iDays1 > 0) {
                $this->sEmailContent .= PHP_EOL."距离{$count}周年还剩{$iDays1}天";
            }else{
                $this->sEmailContent .= PHP_EOL."今天是登记{$count}周年纪念日";
            }
            foreach ($item['toEmail'] as $one) {
                MySendEmail::bSend($item['fromName'], $one, $item['emailTitle'], $this->sEmailContent);
            }
        }
    }

}
