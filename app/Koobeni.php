<?php

namespace App;

use Storage\utils\CustomResponse;
use Storage\utils\Exceptions;
use Storage\utils\KobeniQuery;
use Storage\utils\kobeniSecurity;
use Storage\utils\kobeniToken;
use Storage\utils\useExceptions;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Koobeni extends BaseController
{
    use Exceptions, CustomResponse, useExceptions, KobeniQuery, kobeniToken , kobeniSecurity;

    public Request $req;

    public function __construct(Request $req)
    {
        $this->req = $req;
        $this->bootKobeniQuery();
    }
}
