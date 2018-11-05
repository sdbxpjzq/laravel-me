<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
$aPathArr = [
    'activity'
];
foreach ($aPathArr as $item) {
// base_path()  // /data/wwwroot/laravel
    foreach (glob(base_path('/routes/' . $item) . "/*.php") as $file) {
        include_once $file;
    }
}

Route::get('/', function () {
    return view('welcome');
});


