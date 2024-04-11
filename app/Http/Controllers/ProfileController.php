<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user(); 

        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $user->id,
        ];
        if ($request->filled('password')) {
            $rules['old_password'] = 'required|string';
            $rules['password'] = 'nullable|string|min:8|confirmed';
        }

        $request->validate($rules, [
            'password.confirmed' => 'The new password confirmation does not match.',
        ]);
        
        $profileChanged = $user->name != $request->name || $user->email != $request->email;

        if ($request->filled('password')) {
            if (!Hash::check($request->old_password, $user->password)) {
                return back()->withErrors(['old_password' => 'The provided old password is incorrect.']);
            }
            $profileChanged = true; 
        }

        if ($profileChanged) {
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            return back()->with('success', 'Profile information updated successfully!');
        }

        return back();
    }
}
