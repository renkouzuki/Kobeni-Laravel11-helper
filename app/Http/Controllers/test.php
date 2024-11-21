<?php

namespace App\Http\Controllers;

use App\Koobeni;
use App\Models\Share;
use Exception;

class test extends Koobeni
{
    public function bruh(){
        try{
            $data = Share::latest()->paginate(5);
            return $this->paginationDataResponse($data);
        }catch(Exception $e){
            return $this->handleException($e , $this->req);
        }
    }
}
