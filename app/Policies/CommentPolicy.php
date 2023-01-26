<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;
    public function __construct()
    {
        //
    }

    public function view(User $user, Comment $comment)
    {
        return $user->id == $comment->user_id;
    }

    public function update(User $user, Comment $comment)
    {
        return $user->id == $comment->user_id;
    }
    public function delete(User $user, Comment $comment)
    {
        return $user->id == $comment->user_id;
    }
}
