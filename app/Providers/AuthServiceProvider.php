<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Repositories\UserRepository;
use App\Services\AuthService;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->app->bind(AuthService::class, function ($app) {
            return new AuthService(
                $app->make(UserRepository::class),
                env('TWILIO_SID'),
                env('TWILIO_AUTH_TOKEN'),
                env('TWILIO_PHONE_NUMBER')
            );
        });
    }
}
