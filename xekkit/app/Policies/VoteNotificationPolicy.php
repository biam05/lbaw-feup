<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VoteNotification;
use Illuminate\Auth\Access\HandlesAuthorization;

class VoteNotificationPolicy
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
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\VoteNotification $vote
     *
     * @return mixed
     */
    public function view(?User $user, VoteNotification $vote)
    {
        
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\VoteNotification $vote
     *
     * @return mixed
     */
    public function update(User $user, VoteNotification $vote)
    {
        
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\VoteNotification $vote
     *
     * @return mixed
     */
    public function delete(User $user, VoteNotification $vote)
    {
        
    }
}
