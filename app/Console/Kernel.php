<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *  应用里的自定义 Artisan 命令
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\CallRoute'
    ];

    /**
     * Define the application's command schedule.
     * 定义计划任务
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//        * * * * * cd /data/wwwroot/laravel/ && /usr/local/php/bin/php artisan schedule:run >> /dev/null 2>&1
        // 每天执行
        $schedule->call(function (){
            // VPN 说明
            \App\Http\Controllers\Email\Controller\Vpn::bSendVpnEmail();
        })->daily();
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');


        require base_path('routes/console.php');
    }
}
