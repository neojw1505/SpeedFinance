<?php

namespace App\Providers;

use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::before(function ($user, $role) {
        //     return $user->allRoles()->contains($role);
        // });

        Gate::define('admin-priv', function () {
            return Auth::user()->allRoles()->contains('superAdmin');
        });

        Gate::define('manager-priv', function () {
            return Auth::user()->allRoles()->contains('manager');
        });

        Gate::define('rm-priv', function () {
            return Auth::user()->allRoles()->contains('rm');
        });

        Gate::define('approver-priv', function () {
            return Auth::user()->allRoles()->contains('approver');
        });

        Gate::define('active-approvers', function () {
            return Auth::user()->approver()->exists();
        });

        Gate::define('create-acc', function () {
            $user = User::find(Auth::user()->id);
            return ($user->allRoles()->contains('superAdmin') || $user->allRoles()->contains('manager'));
        });

        Gate::define('admin-manager', function () {
            $user = User::find(Auth::user()->id);
            return ($user->allRoles()->contains('superAdmin') || $user->allRoles()->contains('manager'));
        });

        Gate::define('manager-rm', function () {
            $user = User::find(Auth::user()->id);
            return ($user->allRoles()->contains('manager') || $user->allRoles()->contains('rm'));
        });

        Gate::define('update-application', function (User $user, $application) {
            return $user->id == $application->user_id;
        });
    }
}
