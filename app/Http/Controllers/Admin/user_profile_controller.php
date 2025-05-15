<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class user_profile_controller extends Controller
{
    public function edit(){
        return view('user-profile',[
            'user' => Auth::user(),
        ]);

    
    }

    public function update(Request $request){
        $user = Auth::user();
        $request->validate([
            'name' => ['required','string'],
            'email' => ['required','email', Rule::unique('users','email')->ignore($user->id)],
            'profile_photo' => ['nullable','image','dimentions:min_width=200,min_height=200', 'max:512000',],
        ]);

        if ($request->hasFile('profile_photo')){
            $file = $request->file('profile_photo');
            $path = $file->store('/profile-photos',[
                'disk' => 'public'
            ]);
            $request->merge([
                'profile_photo_path' => $path ,
            ]);
        }

        $user->update($request->all());
        return redirect('')->with('success', 'Profile Updated');

    }

}

