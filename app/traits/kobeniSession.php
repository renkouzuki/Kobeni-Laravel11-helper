<?php

namespace App\Traits;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait kobeniSession
{
    public function SessionRegister($credentials , $model){
        if(!isset($data['password'])){
            throw new AuthenticationException('Need to key["password"]!');
        }

        $user = $model::create($credentials);

        return $user;
    }

    public function SessionLogin($credentials , Request $req){
        if(!Auth::attempt($credentials)){
            throw new AuthenticationException('Invalid credentials!');
        }
        $req->session()->regenerate();
    }

    public function SessionLogout(Request $req){
        Auth::guard('web')->logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
    }
}
