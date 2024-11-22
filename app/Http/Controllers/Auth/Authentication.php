<?php

namespace App\Http\Controllers\Auth;

use App\Koobeni;
use App\Models\User;
use Exception;
class Authentication extends Koobeni {

    public function register(){
        try{
            $cred = $this->req->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|confirmed',
            ]);

            $user = $this->TokenRegister($cred , User::class , false , null);

            return $this->dataResponse($user);

        }catch(Exception $e){
            return $this->handleException($e , $this->req);
        }
    }

    public function login(){
        try{
            $cred = $this->req->validate([
                'email' => 'required|string',
                'password' => 'required|string'
            ]);

            $data = $this->TokenLogin($cred , User::class , null);

            return $this->dataResponse($data);
        }catch(Exception $e){
            return $this->handleException($e , $this->req);
        }
    }

    public function logout(){
        try{
            $this->TokenLogout($this->req->user());
            return $this->dataResponse(null,'Logout successfully');
        }catch(Exception $e){
            return $this->handleException($e , $this->req);
        }
    }

    public function show(){
        try{
            return $this->dataResponse($this->req->user());
        }catch(Exception $e){
            return $this->handleException($e , $this->req);
        }
    }
}