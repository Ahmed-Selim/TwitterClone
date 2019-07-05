<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;
use App\Http\Requests\TweetRequest;
use App\TweetTag;

class TweetController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']) ;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        // return view('tweets.create') ;
    }

    public function store(TweetRequest $request)
    {
        // $image = $request['image_url']->store('tweets', 'public');

        $tweet = auth()->user()->profile->tweets()->create(
            // array_merge(
            $request->all()
            // , ['image_url' => "/storage/{$image}}"])
        ) ;

        $tweet->save() ;

        if ($request->tags) {
            foreach($request->tags as $tag) {
                $tagIds[] = TweetTag::firstOrCreate(['tag' => $tag])->id;
            }
            $tweet->tags()->attach($tagIds);
        }
        return $tweet ;
    }

    public function show(Tweet $tweet)
    {
        return $tweet ;
    }

    public function edit(Tweet $tweet)
    {
        //
    }

    public function update(Request $request, Tweet $tweet)
    {
        //
    }

    public function destroy(Tweet $tweet)
    {
        //
    }
}
