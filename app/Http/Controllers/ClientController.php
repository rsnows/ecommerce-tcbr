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
        $user->login = $request->input('cpf', '');
        
        $address = new Address($values);

        try {
            $user->save();
            $address->user_id = $user->id;
            $address->save();
        } catch (\Exception $e) {
            
        }

        return redirect()->route('register');
    }
}
