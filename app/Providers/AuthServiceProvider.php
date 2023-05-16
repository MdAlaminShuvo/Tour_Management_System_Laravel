<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerPolicies();

          /* define a super admin role */
          Gate::define('isSuperAdmin', function($user) {
            return $user->usertype == 3;
         });
        
         /* define a local guide role */
         Gate::define('isLocalGuide', function($user) {
             return $user->usertype == 1;
         });
       
         /* define a local host role */
         Gate::define('isLocalHost', function($user) {
             return $user->usertype == 2;
         });

        /* define a tourist role */
        Gate::define('isTourist', function($user) {
            return $user->usertype == 0;
        });
         
        
    }
}
