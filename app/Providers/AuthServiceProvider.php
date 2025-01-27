<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function (User $user) {
            return $user->isSuperAdmin();
        });

        Gate::define('manage-students', function (User $user) {
            return $user->isAdmin() || $user->isSuperAdmin();
        });

        Gate::define('take-attendance', function (User $user) {
            return $user->isAdmin();
        });
    }
}
