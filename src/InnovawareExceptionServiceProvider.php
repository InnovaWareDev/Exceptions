<?php

namespace Innovaware\Exceptions;

use Illuminate\Support\ServiceProvider;

class InnovawareExceptionServiceProvider extends ServiceProvider {
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'emails');

    }
    public function register()
    {
    }
}
