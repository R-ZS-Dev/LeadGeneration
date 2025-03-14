<?php

namespace App\Providers;

use App\Models\Company;
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $company = Company::first();
            $favicon = $company && $company->fav_photo ? $company->fav_photo : 'default.jpg';
            $view->with([
                'favicon' => $favicon,
            ]);
        });
    }
}
