<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Storyblok\Api\StoriesApi;
use Storyblok\Api\StoryblokClient;

class StoryblokServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(StoryblokClient::class, function ($app) {
            return new StoryblokClient(
                "https://api.storyblok.com/v2/cdn/",
                config("services.storyblok.access_token"),
            );
        });

        $this->app->singleton(StoriesApi::class, function ($app) {
            return new StoriesApi(
                $app->make(StoryblokClient::class),
                config("services.storyblok.version"),
            );
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
