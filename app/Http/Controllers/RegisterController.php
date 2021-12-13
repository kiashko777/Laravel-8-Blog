<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
  /*
   * METHOD TO CREATE THE USER
   * */

  public function create()
  {
    return view('register.create');
  }


  /*
   *  METHOD TO VALIDATE AND STORE THE USER
   * */

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


    return redirect(route('home'))->with('success', 'Congrats,your account has been created!');
  }
}
