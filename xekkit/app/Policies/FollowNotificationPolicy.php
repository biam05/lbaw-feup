<?php

namespace App\Policies;

use App\Models\User;
use App\Models\FollowNotification;
use Illuminate\Auth\Access\HandlesAuthorization;

class FollowNotificationPolicy
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
        return !($user->is_banned || $user->is_deleted);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\FollowNotification $follow
     *
     * @return mixed
     */
    public function view(User $user, FollowNotification $follow)
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
        // not apliable
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\News $news
     *
     * @return mixed
     */
    public function update(User $user, FollowNotification $follow)
    {
       
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\News $news
     *
     * @return mixed
     */
    public function delete(User $user, FollowNotification $follow)
    {
        
    }
}
