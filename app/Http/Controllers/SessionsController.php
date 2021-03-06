<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionRequest;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    /**
     * Method to handle and validate the sessions.
     * */
    public function create()
    {
        return view('sessions.create');
    }

    public function store(StoreSessionRequest $request)
    {
        $attributes = $request->validated();

        if (auth()->attempt($attributes)) {
            session()->regenerate();

            return redirect(route('home'))->with('success', 'Welcome Back!');
        }

        throw ValidationException::withMessages([
      'email' => 'Your credentials not verified!',
    ]);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect(route('home'))->with('success', 'Goodbye!');
    }
}
