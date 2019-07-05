<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\UserResource;
use App\User;
use App\TweetTag;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']) ;
        // $this->authorizeResource(Profile::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $profiles = Profile::with('user')->get() ;
        // return $profiles ;
    }

    public function create()
    {
        return view('profiles.create') ;
    }

    public function store(ProfileRequest $request)
    {
        auth()->user()->profile()->create(
            array_merge(
                $request->all(),
                $this->imageArray($request)
            )
        );

        return redirect('/profiles/'.auth()->user()->id);
    }

    public function show(Profile $profile)
    {
        $user = new UserResource ($profile->user);
        $latestProfiles =
            // Profile::latest()->limit(5)->get()->toArray() ;
            Profile::whereNotIn('user_id', array_merge(
                [ $profile->id ],
                $profile->user->following->pluck('id')->toArray()
            ))->get();
        // return $latestProfiles ;
        $latestTags = TweetTag::with('tweets')->latest()->limit(5)->get()->toArray() ;
        $follows = $this->isFollowing($user->profile) ;
        return view ('profiles.show', [
            'user' => $user,
            'follows' => $follows,
            'latestProfiles' => $latestProfiles,
            'latestTags' => $latestTags
        ]) ;
    }

    public function edit(Profile $profile)
    {
        $this->authorize('update', $profile) ;
        return view('profiles.edit', compact('profile'));
    }

    public function update(ProfileRequest $request, Profile $profile)
    {
        $this->authorize('update', $profile) ;
        auth()->user()->profile()->update(
            array_merge(
                $request->except(['_token', '_method']),
                $this->imageArray($request)
            )
        );

        return redirect('/profiles/'.auth()->user()->id);
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
    }

    public function search ($pro) {
        $profiles = Profile::where("username", "like", "%{$pro}%")
            ->orWhere("name", "like", "%{$pro}%")->get() ;
        $latestProfiles = Profile::latest()->limit(5)->get()->toArray() ;
        $latestTags = TweetTag::with('tweets')->latest()->limit(5)->get()->toArray() ;
        return view("profiles.search", [
            'profiles' => $profiles,
            'latestProfiles' => $latestProfiles,
            'latestTags' => $latestTags
        ]) ;
    }

    public function isFollowing (Profile $profile) {
        return (auth()->user())
        ? auth()->user()->following->contains($profile)
        : false ;
    }

    private function storeImage ($image) {
        $imagePath = $image->store('uploads', 'public') ;
        return '/storage/' . $imagePath ;
    }

    private function imageArray ($request) : array {
        if ($request['profile_image']) {
            $profile_image = [
                'profile_image' => $this->storeImage($request['profile_image'])
            ] ;
        }

        if ($request['cover_image']) {
            $cover_image = [
                'cover_image' => $this->storeImage($request['cover_image'])
            ];
        }

        return array_merge(
            $profile_image ?? ['profile_image' => '/img/'.$request['gender'].'.png'],
            $cover_image ?? []
        );
    }
}
