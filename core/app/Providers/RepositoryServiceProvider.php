<?php

namespace App\Providers;

use App\Interfaces\DataPostRepoInterface;
use App\Repositories\DataPostRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(DataPostRepoInterface::class, DataPostRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
