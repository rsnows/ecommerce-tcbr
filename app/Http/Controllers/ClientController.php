<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\User;
use App\Services\ClientService;

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

        $clientService = new ClientService();
        $result = $clientService->saveUser($user, $address);
        
        $message = $result["message"];
        $status = $result["status"];

        $request->session()->flash($status, $message);
        return redirect()->route('register');
    }
}
