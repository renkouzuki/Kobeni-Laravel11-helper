<?php

namespace App;

use App\traits\CustomResponse;
use App\traits\Exceptions;
use App\Traits\KobeniQuery;
use App\Traits\useExceptions;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Koobeni extends BaseController
{
    use Exceptions , CustomResponse , useExceptions , KobeniQuery;

    public Request $req;

    public function __construct(Request $req) {
        $this->req = $req;
        $this->bootKobeniQuery();
    }
}
