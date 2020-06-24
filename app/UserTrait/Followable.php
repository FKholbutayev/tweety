<?php

namespace App; 

trait Followable {

    public function follows() {
            return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function follow($user) {
            return $this->follows()->save($user);
    }
} 
