<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [ ] ;

    // protected $with = ['user'] ;

    public function user () {
        return $this->belongsTo(User::class) ;
    }

    public function followers () {
        return $this->belongsToMany(User::class) ;
    }

    public function tweets () {
        return $this->hasMany(Tweet::class) ;
    }

    public function latestTweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }
}
