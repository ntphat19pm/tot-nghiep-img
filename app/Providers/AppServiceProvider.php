<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\nhanvien;
use App\Models\canhan;
use App\Models\nguoithan;
use App\Models\banbe;
use App\Models\lienhe;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


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
        Paginator::useBootstrap();
        view()->composer('*',function($view){
            $view->with([
                'lienhe'=>lienhe::all(),
                'canhan'=>canhan::all(),
                'nguoithan'=>nguoithan::all(),
                'banbe'=>banbe::all(),
            ]);
        });

    }
}
