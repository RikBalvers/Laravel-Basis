<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }


    public function store()
    {
        $attrubutes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(! auth()->attempt($attrubutes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }

        session()->regenerate();
        return redirect('/')->with('succes', 'Welcome Back!');

        // return back()
        //     ->withInput()
        //     ->withErrors(['email' => 'Your provided credentials could not be verified.']);

    }


    public function destroy()
    {
        // dd('logout');
        auth()->logout();
        return redirect('/')->with('succes', 'Goodbye!');
    }
}
