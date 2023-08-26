<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

use App\DTO\CreateUserRequestDTO;
use App\DTO\ImportRequestDTO;

class DTOServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(CreateUserRequestDTO::class, function ($app) {
            return new CreateUserRequestDTO();
        });

        $this->app->singleton(ImportRequestDTO::class, function ($app) {
            return new ImportRequestDTO();
        });     
    }
}
