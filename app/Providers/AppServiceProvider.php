<?php

namespace App\Providers;

use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\OfferRepository;
use App\Repositories\Eloquent\PostRepository;
use App\Repositories\Eloquent\RoleRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Interfaces\ICategory;
use App\Repositories\Interfaces\IOffer;
use App\Repositories\Interfaces\IPost;
use App\Repositories\Interfaces\IRole;
use App\Repositories\Interfaces\IUser;
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
        $this->app->bind(IUser::class, UserRepository::class);
        $this->app->bind(IRole::class, RoleRepository::class);
        $this->app->bind(IOffer::class, OfferRepository::class);
        $this->app->bind(ICategory::class, CategoryRepository::class);
        $this->app->bind(IPost::class, PostRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
