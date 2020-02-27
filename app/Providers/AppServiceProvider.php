<?php

namespace App\Providers;

use Closure;
use Illuminate\Support\Arr;
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
        Schema::defaultStringLength(191);

        Arr::macro(
            'map',
            function (array $array, Closure $callback) {
                return array_map(
                    $callback,
                    $array,
                    array_keys($array)
                );
            }
        );

        Arr::macro(
            'values',
            function (array $array) {
                return array_values($array);
            }
        );

        Arr::macro(
            'keys',
            function (array $array) {
                return array_keys($array);
            }
        );

        Arr::macro(
            'flip',
            function (array $array) {
                return array_flip($array);
            }
        );

        Arr::macro(
            'each',
            function (array $array, Closure $callback) {
                foreach ($array as $item => $index) {
                    $callback($item, $index);
                }
            }
        );

        Arr::macro(
            'merge',
            function (array ...$arrays) {
                return array_merge(...$arrays);
            }
        );
    }
}
