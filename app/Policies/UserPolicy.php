<?php

namespace App\Policies;

use App\ModelsUser;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the models user.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsUser  $modelsUser
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->role === 1;
    }

    /**
     * Determine whether the user can create models users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role === 1;
    }

    /**
     * Determine whether the user can update the models user.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsUser  $modelsUser
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->role === 1;
    }

    /**
     * Determine whether the user can delete the models user.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsUser  $modelsUser
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->role === 1;
    }

    /**
     * Determine whether the user can restore the models user.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsUser  $modelsUser
     * @return mixed
     */
    public function restore(User $user, ModelsUser $modelsUser)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the models user.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsUser  $modelsUser
     * @return mixed
     */
    public function forceDelete(User $user, ModelsUser $modelsUser)
    {
        //
    }
}
