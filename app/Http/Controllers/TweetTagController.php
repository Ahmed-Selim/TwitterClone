<?php

namespace App\Http\Controllers;

use App\TweetTag;
use App\Profile;
use Illuminate\Http\Request;
use App\Tweet;
use Illuminate\Support\Facades\Cache;

class TweetTagController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']) ;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Cache::remember(
            'tags',
            now()->addSeconds(30),
            function () {
            return TweetTag::with('tweets')->latest()->get() ;
        });

        return $tags ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TweetTag  $tweetTag
     * @return \Illuminate\Http\Response
     */
    public function show(TweetTag $tweetTag)
    {
        $tweets = $tweetTag->tweets()->with("profile")->get() ;
        $latestProfiles = Profile::latest()->limit(5)->get()->toArray() ;
        $latestTags = TweetTag::with("tweets")->latest()->limit(5)->get()->toArray() ;
        return view('tweets.show', [
            'tag' => $tweetTag->tag ,
            'tweets' => $tweets,
            'latestProfiles' => $latestProfiles,
            'latestTags' => $latestTags
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TweetTag  $tweetTag
     * @return \Illuminate\Http\Response
     */
    public function edit(TweetTag $tweetTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TweetTag  $tweetTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TweetTag $tweetTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TweetTag  $tweetTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(TweetTag $tweetTag)
    {
        //
    }
}
