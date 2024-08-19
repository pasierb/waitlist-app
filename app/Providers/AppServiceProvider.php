<?php

namespace App\Providers;

use App\Models\User;
use App\Services\GptProjectVersionSuggestionService;
use App\Services\ProjectVersionSuggestionService;
use Illuminate\Support\ServiceProvider;
use Laravel\Pennant\Feature;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        ProjectVersionSuggestionService::class => GptProjectVersionSuggestionService::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Feature::define('ai-assistant', fn (User $user) => match (true) {
            $user->isGod() => true,
            default => true,
        });
    }
}
