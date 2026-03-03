<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Administrador extends Authenticatable implements JWTSubject
{
    
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected $hidden = ['password'];


    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomclaims(){
        return [];
    }

}
