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
        'name', 'email', 'password',
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
                    ->latest()->get();
    }

    public function tweets() {
        return $this->hasMany(Tweet::class, 'user_id');
    }

    public function getAvatarAttribute() {
        return "https://i.pravatar.cc/200?u=" .$this->email;
    }

    public function follows() {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function follow($user) {
        return $this->follows()->save($user);
    }
}
