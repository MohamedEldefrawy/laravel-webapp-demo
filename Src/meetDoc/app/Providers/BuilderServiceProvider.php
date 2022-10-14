<?php

namespace App\Providers;

use App\Builder\Contracts\DocumentBuilderInterface;
use App\Builder\Contracts\UserBuilderInterface;
use App\Builder\DocumentBuilder;
use App\Builder\PatientBuilder;
use Illuminate\Support\ServiceProvider;

class BuilderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->app->bind(UserBuilderInterface::class, PatientBuilder::class);
        $this->app->bind(DocumentBuilderInterface::class, DocumentBuilder::class);
    }
}
