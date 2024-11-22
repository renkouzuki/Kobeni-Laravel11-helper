<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    public function user(){
        return $this->belongsTo(User::class , 'requester_id');
    }
}
