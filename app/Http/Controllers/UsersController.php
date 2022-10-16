<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function index()
    {
        return  view('users.index', [
            'users' => User::paginate(10)->withQueryString()
        ]);
    }

    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
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

    public function destroy(User $user)
    {
        if ($user->admin == true) {
            return back()->with('error', 'Administrators cannot be deleted');
        }
        $user->delete();

        return redirect('/')->with('success', 'Account deleted!');
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
