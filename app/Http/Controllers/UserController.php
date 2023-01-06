<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $data = [];

        if($request->isMethod("POST"))
        {
            $login = $request->input("login");
            $login = preg_replace("/[^0-9]/", "", $login);
            $password = $request->input("password");

            $credential = [ 'login' => $login, 'password' => $password];

            if(Auth::attempt($credential))
            {
                return redirect()->route("home");
            } else {
                $request->session()->flash("err", "Usuário/senha inválido.");
                return redirect()->route("login");
            }
        }

        return view("login", $data);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("home");
    }
}
