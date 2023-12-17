<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 执行迁移报错 Specified key was too long; max key length is 1000 bytes,
        // 解决方案：修改默认字符串长度
        Schema::defaultStringLength(191);
    }
}
