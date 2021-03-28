<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the product can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the product can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Product  $model
     * @return mixed
     */
    public function view(User $user, Product $model)
    {
        return true;
    }

    public function slugView(User $user)
    {
        return true;
    }

    /**
     * Determine whether the product can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the product can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Product  $model
     * @return mixed
     */
    public function update(User $user, Product $model)
    {
        return true;
    }

    /**
     * Determine whether the product can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Product  $model
     * @return mixed
     */
    public function delete(User $user, Product $model)
    {
        return true;
    }

    /**
     * Determine whether the product can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Product  $model
     * @return mixed
     */
    public function restore(User $user, Product $model)
    {
        return false;
    }

    /**
     * Determine whether the product can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Product  $model
     * @return mixed
     */
    public function forceDelete(User $user, Product $model)
    {
        return false;
    }
}
