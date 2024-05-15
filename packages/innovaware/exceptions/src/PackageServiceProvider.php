<?php

namespace Innovaware\Exceptions;

use Illuminate\Support\ServiceProvider;
class PackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'package');

    }

    public function register()
    {
        //
    }
}
