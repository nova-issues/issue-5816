<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Laravel\Nova\Actions\ActionEvent;

class ActionEventPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Laravel\Nova\Actions\ActionEvent  $actionEvent
     * @return mixed
     */
    public function view(User $user, ActionEvent $actionEvent)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Laravel\Nova\Actions\ActionEvent  $actionEvent
     * @return mixed
     */
    public function update(User $user, ActionEvent $actionEvent)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Laravel\Nova\Actions\ActionEvent  $actionEvent
     * @return mixed
     */
    public function delete(User $user, ActionEvent $actionEvent)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Laravel\Nova\Actions\ActionEvent  $actionEvent
     * @return mixed
     */
    public function restore(User $user, ActionEvent $actionEvent)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Laravel\Nova\Actions\ActionEvent  $actionEvent
     * @return mixed
     */
    public function forceDelete(User $user, ActionEvent $actionEvent)
    {
        //
    }
}
