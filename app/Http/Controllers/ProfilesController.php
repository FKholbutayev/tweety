<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller {
    
    public function show(User $user) {
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user) {
        
        $this->authorize('edit', $user);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user) {

        request()->validate([

            'username' => [
                'string', 
                'required', 
                'max:255', 
                'alpha_dash', 
                Rule::unique('users')->ignore($user)
            ], 

            'name' => ['string', 'required', 'max:255'],

            'email' => [
                'string', 
                'email', 
                'required', 
                'max:255', 
                Rule::unique('users')->ignore($user)
            ], 

            'password' => ['string', 'required', 'min:6', 'max:255', 'confirmed']
        ]);
    }
}
