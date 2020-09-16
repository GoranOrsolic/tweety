<?php

namespace App;
use App\Tweet;
use App\User;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	 protected $guarded = [];

    public function co()
    {
        return $this->belongsTo(Tweet::class,
            'comments',
            'user_id',
            'tweet_id'
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function tweets()
    {
        return $this->belongsTo(Tweet::class);
    }

    
}
