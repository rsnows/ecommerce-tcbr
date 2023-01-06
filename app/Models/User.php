<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;

class User extends RModel implements Authenticatable
{
    protected $table = "users";
    protected $fillable = ['email', 'password', 'name', 'login'];


    public function getAuthIdentifierName()
    {
        return 'login';
    }
    
    public function getAuthIdentifier()
    {
        return $this->login;
    }
    
    public function getAuthPassword()
    {
        return $this->password;
    }
    
    public function getRememberToken()
    {}
    
    public function setRememberToken($value)
    {}
    
    public function getRememberTokenName()
    {}

    public function setLoginAttribute($login)
    {
        $value = preg_replace("/[^0-9]/", "", $login);
        $this->attributes['login'] = $value;
    }
}
