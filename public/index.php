<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

# todo 之所以在这里加，不在上面一步加，是因为上面一步以后才能使用最基本的一些方法函数
//$xhprof_data = \xhprof_enable();
/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';
/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

// todo 结束分析
//$xhprof_data = xhprof_disable();
//require_once '/data/wwwroot/www.aa.com/xhprof_lib/utils/xhprof_lib.php';
//require_once '/data/wwwroot/www.aa.com/xhprof_lib/utils/xhprof_runs.php';
//$xhprof_runs = new XHProfRuns_Default();
//$run_id = $xhprof_runs->save_run($xhprof_data, 'your_project');
//header("XHPROF-URL:http://192.168.33.10:83/index.php?run={$run_id}&source=your_project");

$response->send();
$kernel->terminate($request, $response);
