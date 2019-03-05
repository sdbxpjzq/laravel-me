<?php
/**
 * Created by PhpStorm.
 * User: zongqi
 * Date: 2018-12-11
 * Time: 16:52
 */

namespace App\Http\Controllers\Lottery\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Award extends Model
{
    protected $table = '';

    public function aSave($aData)
    {
        return DB::table('lottery_award')->updateOrInsert(['id' => $aData['id']], $aData);
    }
}
