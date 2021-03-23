<?php

namespace App\Policies;

use App\Models\User;
use App\Models\OrderProduct;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the orderProduct can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the orderProduct can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OrderProduct  $model
     * @return mixed
     */
    public function view(User $user, OrderProduct $model)
    {
        return true;
    }

    /**
     * Determine whether the orderProduct can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the orderProduct can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OrderProduct  $model
     * @return mixed
     */
    public function update(User $user, OrderProduct $model)
    {
        return true;
    }

    /**
     * Determine whether the orderProduct can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OrderProduct  $model
     * @return mixed
     */
    public function delete(User $user, OrderProduct $model)
    {
        return true;
    }

    /**
     * Determine whether the orderProduct can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OrderProduct  $model
     * @return mixed
     */
    public function restore(User $user, OrderProduct $model)
    {
        return false;
    }

    /**
     * Determine whether the orderProduct can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\OrderProduct  $model
     * @return mixed
     */
    public function forceDelete(User $user, OrderProduct $model)
    {
        return false;
    }
}
