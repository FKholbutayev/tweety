<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Like;

class Tweet extends Model {
    
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function like($user = null, $liked = true) {
        
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->user(),

        ], [
            'liked' => $liked
        ]);
    }

    public function isLikedBy(User $user) {
        return (bool) $user->likes
                ->where('tweet_id', $this->id)
                ->where('liked', true)
                ->count();
    }

    public function isDislikedBy(User $user) {
        return (bool) $user->likes
                ->where('tweet_id', $this->id)
                ->where('liked', false)
                ->count();
    }

    public function dislike($user = null) {
        $this->like($user, false);
    }
}
