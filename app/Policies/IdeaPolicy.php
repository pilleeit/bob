<?php

namespace App\Policies;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IdeaPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function update(User $user, Idea $idea): bool
    {
        // return false;

        // return $user->id === $idea->user_id; //kui tahta see lisada eemalda bool> ? Response::allow() : Response::denyAsNotFound()

        return $user->is($idea->user);
    }

    /**
     * Determine whether the user can create the model.
     */

    // see oli näidis kuidas ainult admin saab luua ideesid

    // public function create(User $user): bool
    // {

    //     return $user->isAdmin();
    // }
}
