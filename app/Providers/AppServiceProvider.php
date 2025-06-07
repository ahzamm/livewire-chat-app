<?php

namespace App\Providers;

use App\Interfaces\MessageRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\MessageRepository;
use App\Services\MessageService;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(MessageRepositoryInterface::class, MessageRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        $this->app->bind(MessageService::class, function ($app) {
            return new MessageService($app->make(MessageRepositoryInterface::class));
        });
        $this->app->bind(UserService::class, function ($app) {
            return new UserService($app->make(UserRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
