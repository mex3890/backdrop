<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class MigrationsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        foreach (File::directories(database_path('migrations')) as $path) {
            $this->loadMigrationsFrom($path);
        }
    }
}
