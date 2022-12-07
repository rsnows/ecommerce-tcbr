<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function register(Request $request){
        $data = [];

        return view("register", $data);
    }
}
