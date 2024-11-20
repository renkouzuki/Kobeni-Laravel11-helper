<?php

namespace App\Http\Controllers\Example1;

use bootstrap\traits\CustomMiddle;

class testMiddleware
{
    use CustomMiddle;

    public function handler(){
        if(true){
            
        };
    }
}