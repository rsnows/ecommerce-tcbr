<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\User;

class ClientController extends Controller
{
    public function register(Request $request){
        $data = [];

        return view("register", $data);
    }

    public function registerClient(Request $request){

        $values = $request->all();
        $user = new User();
        $user->fill($values);
        $address = new Address($values);

        return redirect()->route('register');
    }
}
