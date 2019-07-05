<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TweetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'profile_id' => $this->profile_id,
            'body' => $this->body ,
            'likes' => $this->likes ,
            'retweets' => $this->retweets ,
            'replies' => $this->replies,
            'tags' => TweetTagResource::collection($this->tags),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
