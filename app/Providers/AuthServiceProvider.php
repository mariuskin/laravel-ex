<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\CudPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Illuminate\Database\Eloquent\Model' => 'App\Policies\ModelPolicy',
        'App\Act' =>  'App\Policies\CudPolicy',
        'App\Car' =>  'App\Policies\CudPolicy',
        'App\Contract' =>  'App\Policies\CudPolicy',
        'App\Owner' =>  'App\Policies\CudPolicy',
        'App\Ownership' =>  'App\Policies\CudPolicy',
        'App\Run' =>  'App\Policies\CudPolicy',
        'App\TechnicalInspection' =>  'App\Policies\CudPolicy',
        'App\Section' =>  'App\Policies\CudPolicy',
        'App\Department' =>  'App\Policies\CudPolicy',

        // 'App\Owner' => 'App\Policies\OwnerPolicy',
    ];

    // *
    //  * The policy mappings for the application.
    //  *
    //  * @var array
     
    // protected $policies = [
    //     Cud::class => CudPolicy::class,
    // ];


    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

    }
}
