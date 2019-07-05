<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Http\Resources\UserResource;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\TweetTagResource;
use App\TweetTag;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth') ;
    }

    /**
     * current 'auth' user wants to follow 'other' user
     */
    public function store (User $user) {
        return auth()->user()->following()->toggle($user->profile) ;
    }

    public function show (User $user) {
        $user = new UserResource($user) ;
        $latestProfiles = Profile::latest()->limit(5)->get()->toArray() ;
        $latestTags = TweetTag::with("tweets")->limit(5)->get()->toArray() ;
        // $profile = $user->profile ;

        // $following = ProfileResource::collection($user->following) ;

        // $followers = UserResource::collection($user->profile->followers) ;

        // return view('follows.show', compact('profile', 'user', 'following', 'followers'));
        return view('follows.show', [
            'user' => $user,
            'latestProfiles' => $latestProfiles,
            'latestTags' => $latestTags
        ]);
    }

}
