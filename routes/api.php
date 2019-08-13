<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('test', function () {
    print_r($_SERVER);
//    \App\Http\Controllers\Test\T2::indexT2();
});


Route::post('/7', function () {
    //实例化并获取系统变量传参
    $upload = new \App\Http\Controllers\Tool\MaxFileUpload($_FILES['file']['tmp_name'], $_POST['blob_num'], $_POST['total_blob_num'], $_POST['file_name']);
//调用方法，返回结果
    $upload->apiReturn();
});

Route::get('/6', function () {
//    \App\Http\Controllers\Lottery\Controller\LotteryPond::index();
//获取回调函数名
    $jsoncallback = htmlspecialchars($_REQUEST ['jsoncallback']);
//json数据
    $json_data = '["customername-zongq","customername-qi"],"methodName"';
//输出jsonp格式的数据
    echo $jsoncallback . "(" . $json_data . ")";
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


