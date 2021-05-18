<?php

namespace App\Policies;

use App\Models\Faq;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class FAQPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_moderator;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Faq $faq
     *
     * @return mixed
     */
    public function update(User $user, Faq $faq)
    {
        return $user->id === $news->content->author_id && !($user->is_banned || $user->is_deleted);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Faq $faq
     *
     * @return mixed
     */
    public function delete(User $user, Faq $faq)
    {
        // Only a news author can delete it or a moderator
        return ($user->id === $news->content->author_id && !($user->is_banned || $user->is_deleted)) || ($user->is_moderator && !($user->is_banned || $user->is_deleted));
    }

}
