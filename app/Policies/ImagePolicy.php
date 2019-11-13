<?php

namespace App\Policies;

use App\Models\Image;
use App\ModelsImage;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models images.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the models image.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsImage  $modelsImage
     * @return mixed
     */
    public function view(User $user, ModelsImage $modelsImage)
    {
        //
    }

    /**
     * Determine whether the user can create models images.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the models image.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsImage  $modelsImage
     * @return mixed
     */
    public function update(User $user, ModelsImage $modelsImage)
    {
        //
    }

    /**
     * Determine whether the user can delete the models image.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsImage  $modelsImage
     * @return mixed
     */
    public function delete(User $user, Image $image)
    {
        return $user->role == 1 || $user->role == 2;
    }

    /**
     * Determine whether the user can restore the models image.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsImage  $modelsImage
     * @return mixed
     */
    public function restore(User $user, ModelsImage $modelsImage)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the models image.
     *
     * @param  \App\User  $user
     * @param  \App\ModelsImage  $modelsImage
     * @return mixed
     */
    public function forceDelete(User $user, ModelsImage $modelsImage)
    {
        //
    }
}
