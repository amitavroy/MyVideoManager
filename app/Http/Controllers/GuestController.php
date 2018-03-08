<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function verify($token)
    {
        $user = User::where('activation_token', $token)->first();

        if (!$user) {
            abort(400, 'Bad request.');
        }

        $user->activation_token = null;
        $user->active = 1;
        $user->save();

        Auth::login($user);

        return redirect()->route('home');
    }
}
