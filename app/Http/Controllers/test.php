<?php

namespace App\Http\Controllers;

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
