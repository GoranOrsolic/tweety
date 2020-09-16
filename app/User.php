<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
         if(isset($value)) {

        return asset('storage/' . $value );

    } else {

        return asset('images/default-avatar.png');
    }
    }

    public function getBannerAttribute($value)
    {
        if(isset($value)) {

        return asset('storage/' . $value );

    } else {

        return asset('images/default-profile-banner.jpg');
    }
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function timeline()
    {
        //tvitovi korisnika i ostalih

        $friends = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id', $friends)->orWhere('user_id', $this->id)->withLikes()->latest()->paginate(10);

    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function comments() 
    { 
        return $this->hasMany(Comment::class)->latest(); 

    }

   public function path($append = '')
    {
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }

    public function likes() 
    { 
        return $this->hasMany(Like::class); 
    }
}
