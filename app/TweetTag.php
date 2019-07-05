<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TweetTag extends Model
{
    // protected $with = ['tweets'] ;

    protected $guarded = [] ;

    public function tweets () {
        return $this->belongsToMany(Tweet::class, 'tag_tweet', 'tag_id', 'tweet_id') ;
    }

    public function latestTweets () {
        return $this->belongsToMany(Tweet::class, 'tag_tweet', 'tag_id', 'tweet_id')->latest() ;
    }
}
