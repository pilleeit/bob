<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
    // function (?User $user) siis ei pea olema user sisslogitud !!! nb ilma ? kontrollib lihtsalt userit mitte kas tal on õigused
    public function boot(): void
    {
        // AUTH LESSON 4
        // Gate::define('view-admin', function (User $user) {
        //     // return true;
        //     // return $user->id === 1;
        //     // return false;

        //     // if ($user->id === 0) {
        //     //     return Response::allow();
        //     // }

        //     // return Response::denyAsNotFound();

        //     return $user->isAdmin() ? Response::allow() : Response::denyAsNotFound();
        // });
    }
}
