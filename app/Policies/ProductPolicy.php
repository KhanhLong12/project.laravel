<?php

namespace App\Policies;

use App\Models\Product;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models products.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the models product.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsProduct  $modelsProduct
     * @return mixed
     */
    public function view(User $user, Product $product)
    {
        return $user->id === $product->user_id || $user->role === 1 || $user->role === 2;
    }

    /**
     * Determine whether the user can create models products.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role === 1;
    }

    /**
     * Determine whether the user can update the models product.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsProduct  $modelsProduct
     * @return mixed
     */
    public function update(User $user, Product $product)
    {
        return $user->id === $product->user_id || $user->role === 1;
    }

    /**
     * Determine whether the user can delete the models product.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsProduct  $modelsProduct
     * @return mixed
     */
    public function delete(User $user, Product $product)
    {
        return $user->id === $product->user_id || $user->role === 1;
    }

    /**
     * Determine whether the user can restore the models product.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsProduct  $modelsProduct
     * @return mixed
     */
    public function restore(User $user, ModelsProduct $modelsProduct)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the models product.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsProduct  $modelsProduct
     * @return mixed
     */
    public function forceDelete(User $user, ModelsProduct $modelsProduct)
    {
        
    }
}
