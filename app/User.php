<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Tweet;
use App\Followable;

class User extends Authenticatable {
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar','username'
    ];

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

    public function timeline() {
        $friends = $this->follows()->pluck('id');
        return Tweet::whereIn('user_id', $friends)
                    ->orWhere('user_id', $this->id)
                    ->latest()->paginate(50);
    }

    public function tweets() {
        return $this->hasMany(Tweet::class, 'user_id')->latest();
    }

    public function getAvatarAttribute($value) {
        
        $avatar = $value ? 'storage/'.$value : '/images/default.jpg';
        return asset($avatar);
    }

    public function path($append = '') {
        
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }

    // user->password="pswd" it will pipe through this method
    
    public function setPasswordAttribute($value) {
        
        $this->attributes['password'] = bcrypt($value);   
    }



 

    
}
