<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::get()->where('id', '>=', 2);
        return view('home', [
            'users' => $users,
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('home');
    }

    public function edit(User $user)
    {

        return view('home-edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        $user->update($request->all());

        return redirect()->route('home');

    }
}
