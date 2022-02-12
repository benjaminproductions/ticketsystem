<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginScreen()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $userdata = [
            'name'     => $request->get('name'),
            'password'  => $request->get('password'),
        ];

        if (Auth::attempt($userdata)) {
            return redirect(route('index'));
        }

        return redirect(route('login'))->with('error', 'Falsche Einlogdaten');
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('login'))->with('success', 'Erfolgreich Ausgeloggt');
    }
}
