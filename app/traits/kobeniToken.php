<?php

namespace App\Traits;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;

trait kobeniToken
{
    public function kobeniRegister($data , $model , $token = true , $date){
        if(!isset($data['password'])){
            throw new AuthenticationException('Need to key["password"]!');
        }

        $data['password'] = Hash::make($data['password']);

        $user = $model::create($data);

        if($token == true){
            $expireDate = now()->addDays($date);
            if($date){
                $user->createToken('my_token', expiresAt: $expireDate)->plainTextToken;
             }else{
                $user->createToken('my_token')->plainTextToken;
             }
        }

        return $user;        
    }

    public function kobeniLogin($data , $model , $date){
        $keys = array_keys($data);
        $values = array_values($data);
        $user = $model::where($keys[0] , $values[0])->first();

        if(!$user || !Hash::check($values[1] , $user->password)){
            throw new AuthenticationException('Invalid credentials');
        }

        $expireDate = now()->addDays($date);

        $token = '';

        if($date){
           $token = $user->createToken('my_token', expiresAt: $expireDate)->plainTextToken;
        }else{
           $token = $user->createToken('my_token')->plainTextToken;
        }

        return $token;
    }

    public function kobeniLogout($user){
        $user->currentAccessToken()->delete();
    }
}
