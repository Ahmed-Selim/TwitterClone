<?php

namespace App\Policies;

use App\User;
use App\TweetTag;
use Illuminate\Auth\Access\HandlesAuthorization;

class TweetTagPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any tweet tags.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the tweet tag.
     *
     * @param  \App\User  $user
     * @param  \App\TweetTag  $tweetTag
     * @return mixed
     */
    public function view(User $user, TweetTag $tweetTag)
    {
        //
    }

    /**
     * Determine whether the user can create tweet tags.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the tweet tag.
     *
     * @param  \App\User  $user
     * @param  \App\TweetTag  $tweetTag
     * @return mixed
     */
    public function update(User $user, TweetTag $tweetTag)
    {
        //
    }

    /**
     * Determine whether the user can delete the tweet tag.
     *
     * @param  \App\User  $user
     * @param  \App\TweetTag  $tweetTag
     * @return mixed
     */
    public function delete(User $user, TweetTag $tweetTag)
    {
        //
    }

    /**
     * Determine whether the user can restore the tweet tag.
     *
     * @param  \App\User  $user
     * @param  \App\TweetTag  $tweetTag
     * @return mixed
     */
    public function restore(User $user, TweetTag $tweetTag)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the tweet tag.
     *
     * @param  \App\User  $user
     * @param  \App\TweetTag  $tweetTag
     * @return mixed
     */
    public function forceDelete(User $user, TweetTag $tweetTag)
    {
        //
    }
}
