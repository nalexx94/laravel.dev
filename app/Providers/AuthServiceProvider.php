<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('showAdmin',function(User $user){
            foreach ($user->roles as $role)
            {
                if ($role->name == 'Administrator')
                {
                    return TRUE;
                }
            }

            return FALSE;
        });

        Gate::define('showCabinet',function(User $user){
            foreach ($user->roles as $role)
            {
                if ($role->name == 'registered')
                {
                    return TRUE;
                }
            }

            return FALSE;
        });

        //
    }
}
