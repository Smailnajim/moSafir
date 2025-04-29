<?php

namespace App\Providers;

use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\OfferRepository;
use App\Repositories\Eloquent\PostRepository;
use App\Repositories\Eloquent\ReactionRepository;
use App\Repositories\Eloquent\RoleRepository;
use App\Repositories\Eloquent\StatusRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Interfaces\ICategory;
use App\Repositories\Interfaces\IOffer;
use App\Repositories\Interfaces\IPost;
use App\Repositories\Interfaces\IReaction;
use App\Repositories\Interfaces\IRole;
use App\Repositories\Interfaces\IStatus;
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
        $this->app->bind(IStatus::class, StatusRepository::class);
        $this->app->bind(IReaction::class, ReactionRepository::class);
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
