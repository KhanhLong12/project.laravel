<?php

namespace App\Policies;

use App\Models\Category;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models categories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the models category.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsCategory  $modelsCategory
     * @return mixed
     */
    public function view(User $user, Category $category)
    {
        return $user->id === $category->user_id || $user->role === 1 || $user->role === 2;
    }

    /**
     * Determine whether the user can create models categories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        // dd($user);
        return $user->role === 1 || $user->role === 2;
    }

    /**
     * Determine whether the user can update the models category.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsCategory  $modelsCategory
     * @return mixed
     */
    public function update(User $user,Category $category)
    {
        return $user->id === $category->user_id || $user->role === 1 || $user->role === 2;
    }

    /**
     * Determine whether the user can delete the models category.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsCategory  $modelsCategory
     * @return mixed
     */
    public function delete(User $user, Category $category)
    {
        return $user->id === $category->user_id || $user->role === 1;
    }

    /**
     * Determine whether the user can restore the models category.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsCategory  $modelsCategory
     * @return mixed
     */
    public function restore(User $user, ModelsCategory $modelsCategory)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the models category.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsCategory  $modelsCategory
     * @return mixed
     */
    public function forceDelete(User $user, ModelsCategory $modelsCategory)
    {
        //
    }
}
