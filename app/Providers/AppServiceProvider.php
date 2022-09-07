<?php

namespace App\Providers;

use App\Services\TestClass;
use Illuminate\Support\Str;
use App\Services\RegisterMacros;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Collection;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * macros example
         */
        // Collection::macro('titleToUpper', function () {
        //     return $this->map(function ($value) {
        //         if ($value->title) {
        //             $value->title =  Str::upper($value->title);
        //         }
        //         return $value;
        //     });
        // });
        Collection::mixin(new RegisterMacros);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
