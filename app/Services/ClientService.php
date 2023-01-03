<?php

namespace App\Services;

use App\Models\Address;
use App\Models\User;
use Log;

class ClientService
{
    public function saveUser(User $user, Address $address){

        try {

            $dbUser = User::where('login', $user->login)->first();
            if($dbUser)
            {
                return [ 'status' => 'err', 'message' => 'Usuário já cadastrado.'];
            }

            \DB::beginTransaction();
            $user->save();
            $address->user_id = $user->id;
            $address->save();
            \DB::commit();

            return [ 'status' => 'ok', 'message' => 'Usuário cadastrado com sucesso.'];
        } catch (\Exception $e) {
            \Log::error("ERRO", ['file' => 'ClientService.saveUser', 'message' => $e->getMessage()]);
            \DB::rollback();
            return [ 'status' => 'err', 'message' => 'Não foi possível cadastrar o usuário.'];
        }

    }
}