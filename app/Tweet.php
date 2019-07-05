<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $guarded = [] ;

    protected $with = ['tags'] ;

    protected $fillable = [
        'profile_id', 'body',
        // 'media_url'
    ];

    public function profile() {
        return $this->belongsTo(Profile::class) ;
    }

    public function tags() {
        return $this->belongsToMany(TweetTag::class, 'tag_tweet', 'tweet_id', 'tag_id') ;
    }
}
