<?php

use \App\Http\Controllers\Activity\Controller;

Route::prefix('activity')->group(function () {
    // /activity/777


    Route::get('/6', function () {
        Controller\TestRedis::pipline();
        Controller\TestRedis::get();
    });
    Route::get('/getQianDao', function () {

        return json_encode(['zongqi']);

        return Controller\QianDaoTongJi::aContinuousFourDays(1);
    });
    Route::get('/setQianDao', function () {
        // 签到
        $aUserADate = [
            '2018-10-30' => 1,
            '2018-10-31' => 1,
            '2018-11-01' => 1,
            '2018-11-02' => 1,
        ];

        $aUserBDate = [
            '2018-10-30' => 1,
            '2018-10-31' => 0,
            '2018-11-01' => 1,
            '2018-11-02' => 0,
        ];
        foreach ($aUserADate as $time => $state) {
            $info = Controller\QianDaoTongJi::bSetQianDao(1, $state, $time);
            var_dump($info);
        }
        foreach ($aUserBDate as $time => $state) {
            $info = Controller\QianDaoTongJi::bSetQianDao(2, $state, $time);
            var_dump($info);
        }


    });
});
