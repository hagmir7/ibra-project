<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function create()
    {
        return view('user.register');
    }


    public function store(Request $request)
    {

        if ($request->input('password') == $request->input('password_1')) {
            $request->validate([
                "first_name" => 'required|string|max:100',
                "last_name" => 'required|string|max:100',
                'email' => 'required|email|unique:users',
                "password" => 'required|string|max:100',
                'password_1' => 'required'
            ]);


            User::create([
                "first_name" => $request->input('first_name'),
                "last_name" => $request->input('last_name'),
                "email" => $request->input('email'),
                "password" => Hash::make($request->password),
                "token" => Str::random(40),
                "role_id" => 2 // user
            ]);
            return redirect()->route('index')->with('message', 'Utilisateur créé avec succès');
        } else {

            throw ValidationException::withMessages(['password' => 'This value is incorrect']);
        }
    }


    public function login()
    {
        if (Auth::user()) {
            return redirect('dashboard');
        } else {
            return view("user/login");
        }
    }


    public function loginStore(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];


        if (Auth::attempt($credentials)) {
            if (request()->next) {
                return redirect()->intended(request()->next);
            } else {
                return redirect()->intended('/');
            }
        } else {
            return back()->withErrors(['email' => "les informations d'identification invalides"]);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function show(User $user)
    {
        return view('user.profile', [
            "user" => $user
        ]);
    }

}
