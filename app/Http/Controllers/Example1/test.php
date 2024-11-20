<?php

namespace App\Http\Controllers\Example1;

use App\Koobeni;
use Illuminate\Http\Request;

class test extends Koobeni
{
    public function index(){
        return $this->dataResponse([
            "name"=>"renko",
            "email"=>"renko@gmail.com"
        ] , "test!");
    }
}
