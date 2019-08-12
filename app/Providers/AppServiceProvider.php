<?php
namespace App\Providers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
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

    {   ini_set("memory_limit", "100M");
        ini_set('post_max_size', '25M');
        ini_set('upload_max_filesize', '25M');
        Schema::defaultStringLength(191);
    }
}
