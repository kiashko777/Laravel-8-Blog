<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
  public function create()
  {
    return view('register.create');
  }


  public function store()
  {
    $attributes = request()->validate([
      'name' => 'required|max:255|unique:users,name',
      'username' => 'required|max:255|min:3|unique:users,username',
      'email' => 'required|email|max:255|unique:users,email',
      'password' => 'required|max:255|min:7|confirmed',
    ]);

    $attributes['password'] = bcrypt($attributes['password']);

    $user = User::create($attributes);
    auth()->login($user);

    //session()->flash('success', 'Congrats,your account has been created!');

    return redirect('/')->with('success', 'Congrats,your account has been created!');

  }
}
