<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Owner;
use App\User;

class OwnerPolicy
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

        public function before($user, $ability)
    {
        if ($user->user_type === "SUPER_ADMIN") {
            return true;
        }
    }

    /**
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return bool
     */
    public function update(User $user,Owner $owner)
    {
        return ($user->user_type === "ADMIN") || ($user->user_type === "SUPER_ADMIN");
    }
    
    /**
     * Determine if the given user can create posts.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return true;
    }
}
