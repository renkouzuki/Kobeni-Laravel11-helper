<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class test extends Controller
{
    public function index(){
        return $this->dataResponse([
            "name"=>"renko",
            "email"=>"renko@gmail.com"
        ] , "test!");
    }
}
