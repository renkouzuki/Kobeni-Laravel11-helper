<?php

namespace App\Http\Controllers\Auth;

use App\Koobeni;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authentication extends Koobeni {

    public function register(){
        try{
            $this->req->validate([
                'name' => 'required|string',
                'phone_number' => 'required|string|unique:users,phone_number',
                'password' => 'required|string|confirmed',
                'blood_type' => 'required|string',
                'location' => 'required|string',
                'role' => 'required|string'
            ]);

            $user = User::create([
                'name' => $this->req->name,
                'phone_number' => $this->req->phone_number,
                'password' => Hash::make($this->req->password),
                'blood_type' => $this->req->blood_type,
                'location' => $this->req->location,
                'role' => $this->req->role
            ]);

            return $this->dataResponse($user);

        }catch(Exception $e){
            return $this->handleException($e , $this->req);
        }
    }

    public function login(){
        try{
            $cred = $this->req->validate([
                'phone_number' => 'required|string',
                'password' => 'required|string'
            ]);

            $user = User::where('phone_number' , $cred['phone_number'])->first();

            if(!$user || !Hash::check($cred['password'] , $user->password)){
               return $this->Validation(['password' => ['The provided credentials are incorrect.']]);
            }

            $expireDate = now()->addDays(7);
            $token = $user->createToken('my_token', expiresAt: $expireDate)->plainTextToken;
            return $this->dataResponse($token);

        }catch(Exception $e){
            return $this->handleException($e , $this->req);
        }
    }

    public function logout(){
        try{
            $this->req->user()->currentAccessToken()->delete();
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