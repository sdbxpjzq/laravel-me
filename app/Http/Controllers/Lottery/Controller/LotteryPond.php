<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/12/6
 * Time: 上午10:28
 */

namespace App\Http\Controllers\Lottery\Controller;

use \App\Http\Controllers\Lottery\Model\LotteryPond as ModelLotteryPond;

class LotteryPond
{
    protected $iId = 0; // 活动ID
    protected $aData = [];
    protected $sStartDate = '';
    protected $sEndDate = '';
    protected $iAmount = 0;
    public function __construct(int $iId,array $aData)
    {
        $this->iId = $iId;
        $this->aData = $aData;
        $this->iAwardId = $aData['award_id'];
        $this->sStartDate = $aData['start_time'];
        $this->sEndDate = $aData['end_time'];
        $this->iAmount = $aData['count'];
    }

    public function iInsertAward()
    {
        $aMemberKeys = array();
        $iStartTime = strtotime($this->sStartDate);
        $iEndTime = strtotime($this->sEndDate);

        //开始时间大于结束时间，直接返回
        if ($iStartTime > $iEndTime) {
            return $aMemberKeys;
        }

        for ($i = 0; $i < $this->iAmount; $i++) {
            $iMemberScore = mt_rand($iStartTime, $iEndTime);//时间戳作为分数，重复不影响

            $aAwardInfo = array(
                'award_id' => $iAwardId,
                'timestamp' => $iMemberScore,
                'unique_id' => uniqid($iAwardId, true) // uniqid保证奖品唯一性
            );
        }
    }


}
