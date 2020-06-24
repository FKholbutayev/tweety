<?php

namespace App; 
use App\User;

trait Followable {

    public function follows() {
            return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function follow($user) {
            return $this->follows()->save($user);
    }

    public function isFollowing(User $user) {
        return $this->follows()
             ->where('following_user_id', $user->id)
             ->exists();
    }

    public function unfollow($user) {
        return $this->follows()->detach($user);
    }
} 
