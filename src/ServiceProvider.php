<?php
/**
 * Created by PhpStorm.
 * User: HivenKay
 * Date: 16/6/18
 * Time: 下午1:11
 */

namespace HivenKay\LaravelLbs;
use EasyLbs\GeoCloud\GeoColumn;
use EasyLbs\GeoCloud\GeoPoi;
use EasyLbs\GeoCloud\GeoTable;
use EasyLbs\GeoSearch\GeoSearch;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
class ServiceProvider extends LaravelServiceProvider
{
    protected $defer = true;
    public function boot() {
        $this->publishes([
            __DIR__.'/config.php'=>config_path('easy_lbs.php'),
        ]);
    }
    public function register()
    {
//        $this->app->singleton('HivenKay\\LaravelLbs\\EasyLbs',function(){
//            return new GeoTable(config('easy_lbs.server_ak'),config('easy_lbs.server_sk'));
//        });
        $this->app->singleton(GeoTable::class,function(){
            $app = new GeoTable(config('easy_lbs.server_ak'),config('easy_lbs.server_sk'));
            return $app;
        });
        $this->app->singleton(GeoColumn::class,function(){
            $app = new GeoColumn(config('easy_lbs.server_ak'),config('easy_lbs.server_sk'));
            return $app;
        });
        $this->app->singleton(GeoPoi::class,function(){
            $app = new GeoPoi(config('easy_lbs.server_ak'),config('easy_lbs.server_sk'));
            return $app;
        });
        $this->app->singleton(GeoSearch::class,function(){
            $app = new GeoSearch(config('easy_lbs.server_ak'),config('easy_lbs.server_sk'));
            return $app;
        });
        $this->app->singleton('HivenKay\\LaravelLbs\\EasyLbs'); 

    }
    public function provides()
    {
        return [GeoTable::class,GeoColumn::class,GeoPoi::class,GeoSearch::class,'EasyLbs'];
    }
}
