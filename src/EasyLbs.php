<?php
namespace HivenKay\LaravelLbs;

/**
 * Created by PhpStorm.
 * User: HivenKay
 * Date: 16/6/18
 * Time: 下午5:06
 */
class EasyLbs
{
    public function GeoTable() {
        return app(GeoTable::class);
    }
    public function GeoColumn() {
        return app(GeoColumn::class);
    }
    public function GeoPoi() {
        return app(GeoPoi::class);
    }
    public function GeoSearch() {
        return app(GeoSearch::class);
    }
}
