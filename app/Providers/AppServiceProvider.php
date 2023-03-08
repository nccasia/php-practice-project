<?php

namespace App\Providers;

use App\Repositories\Backend\IUserRepository;
use App\Repositories\Backend\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
//        $this->app->singleton(
//            IPostRepository::class,
//            PostRepository::class
//        );
        $this->app->singleton(
            IUserRepository::class,
            UserRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
