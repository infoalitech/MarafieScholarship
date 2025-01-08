<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Scholarship;

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
        //
        $sidebarscholarships = Scholarship::all();
        // dd($sidebarscholarships);
        view()->share('sidebarscholarships', $sidebarscholarships);
    }
}
