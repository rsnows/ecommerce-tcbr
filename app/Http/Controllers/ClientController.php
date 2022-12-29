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

        $password = $request->input("password", "");
        $user->password = \Hash::make($password);
        
        $address = new Address($values);

        try {
            \DB::beginTransaction();
            $user->save();
            $address->user_id = $user->id;
            $address->save();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
        }

        return redirect()->route('register');
    }
}
