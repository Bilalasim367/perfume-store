<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('cache:routes', function () {
    $this->call('route:clear');

    if (app()->isProduction()) {
        $this->call('route:cache');
        $this->info('Routes cached successfully!');
    } else {
        $this->warn('Route caching is only for production environments.');
    }
})->purpose('Cache routes for production');

Artisan::command('optimize:clear', function () {
    $this->call('config:clear');
    $this->call('route:clear');
    $this->call('view:clear');
    $this->call('cache:clear');
    $this->info('All caches cleared!');
})->purpose('Clear all caches');

Artisan::command('optimize:all', function () {
    if (app()->isProduction()) {
        $this->call('config:cache');
        $this->call('route:cache');
        $this->call('view:cache');
        $this->info('All optimizations complete!');
    } else {
        $this->warn('Full optimization is only for production environments.');
    }
})->purpose('Full optimization for production');
