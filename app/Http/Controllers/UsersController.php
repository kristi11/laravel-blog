<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view(
            'users.index',
            [
                'user' => $user
            ]
        );
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(User $user)
    {
        $attributes = $this-> validateUser($user);

        if ($attributes['profile_picture'] ?? false) {
            $attributes['profile_picture'] = request()->file('profile_picture')->store('profile_pictures');
        }

        $user->update($attributes);

        return back()->with('success', 'User updated!');
    }

    // ?user $user = null ---> you dont have to give us a user but if you do we will accept it
    protected function validateUser(?User $user = null): array
    {
        $user = auth()->user();

        return request()->validate([
            'name' => 'required',
            'password' => 'required',
            'profile_picture' => $user->exists ? ['image'] : ['required', 'image'],
            'username' => ['required', Rule::unique('users', 'username')->ignore($user)],
        ]);
    }
}
