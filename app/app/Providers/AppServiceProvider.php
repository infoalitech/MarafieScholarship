<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Scholarship;
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
        //
        if (Schema::hasTable('scholarships')) {
            $sidebarscholarships = Scholarship::all();
            // dd($sidebarscholarships);
            view()->share('sidebarscholarships', $sidebarscholarships);
        }

    }
}
