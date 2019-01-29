<?php

namespace KarimQaderi\ZoroasterColumnFilter;

use Illuminate\Support\ServiceProvider;

class FilterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/view','ZoroasterColumnFilterView');
    }
}