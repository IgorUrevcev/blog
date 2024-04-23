<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed',
       ]);

       $user = User::create ([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
       ]);

       session()->flash('success', 'Регистрация пройдена');
       Auth::login($user);
       return redirect()->route('home');
    }
}
