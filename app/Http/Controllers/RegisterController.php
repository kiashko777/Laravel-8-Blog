<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
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

  public function store(StoreUserRequest $request)
  {
    $attributes = $request->validated();

    $attributes['password'] = bcrypt($attributes['password']);

    $user = User::create($attributes);
    auth()->login($user);


    return redirect(route('home'))->with('success', 'Congrats,your account has been created!');
  }
}
