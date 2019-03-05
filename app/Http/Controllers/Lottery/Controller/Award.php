<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018-12-07
 * Time: 16:57
 */

namespace App\Http\Controllers\Lottery\Controller;


class Award
{
    protected $aData = [];
    public function __construct(array $aData)
    {
        $this->aData = $aData;
    }


}
