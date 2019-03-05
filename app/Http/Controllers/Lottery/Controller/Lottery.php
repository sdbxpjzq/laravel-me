<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018/12/5
 * Time: 下午5:36
 */

namespace App\Http\Controllers\Lottery\Controller;


class Lottery
{
    protected $iId = 0;
    public function __construct($iActivityId)
    {
        $this->iId = $iActivityId;
    }

}
