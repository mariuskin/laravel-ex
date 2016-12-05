<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CudPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    
    /**
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return bool
     */
    public function cud(User $user, Model $model)
    {
        return ( ($user->user_type === "ADMIN") || ($user->user_type === "SUPER_ADMIN") );
        
    }

   
}
