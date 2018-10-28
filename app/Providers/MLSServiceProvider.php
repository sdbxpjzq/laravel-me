<?php

namespace App\Providers;
use App\Custom\Classes\MLS; //注意这里，引入了我们的自定义 Class

use Illuminate\Support\ServiceProvider;

class MLSServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //注意这里的 bind 写法，这是 Laravel 5.3 的正确写法；网上搜索到的很多资料都是不知何年何月的老版本的写法，如果你照抄就只会很郁闷。
        $this->app->bind('mls', function() {
            return new \Custom\Classes\MLS;
        });
    }
}
