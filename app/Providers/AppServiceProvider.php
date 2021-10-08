<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\ReleaseTime;
use App\Models\National;
use App\Models\Config;
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
        view()->composer('*', function($view) {
            $view->with([
                'category'=>Category::where('slug','!=','chieu-rap')->get(),
                'release'=>ReleaseTime::all(),
                'national'=>National::all(),
                'cate_rap'=>Category::where('slug','chieu-rap')->first(),
                'address' => Config::where('slug', 'address')->where('type',3)->first(),
                'map' => Config::where('slug', 'map')->where('type',3)->first(),
                'phone' => Config::where('slug', 'phone')->where('type',3)->first(),
                'worktime' => Config::where('slug', 'work-time')->where('type',3)->first(),
                'email' => Config::where('slug', 'email')->where('type',3)->first(),
                'logo_home'=>Config::where('slug', 'logo-home')->where('type',1)->first(),
                'logo_title'=>Config::where('slug', 'logo-title')->where('type',1)->first(),
            ]); 
        });     
    }
}
