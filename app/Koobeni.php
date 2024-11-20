<?php

namespace App;

use App\traits\Exceptions;
use Illuminate\Routing\Controller as BaseController;

class Koobeni extends BaseController
{
    use Exceptions;

    public function dataResponse($data , $message){
        return response()->json([
            'success'=>true,
            'message' => $message,
            'data' => $data
        ],
        200);
    }

    public function errorResponse(){
        return response()->json([
            'success'=>false,
            'message' => 'Something went wrong', 
        ]);
    }

    public function paginationResponse($data){
        return [
            'current_page' => $data->currentPage(),
            'page_size' => $data->perPage(),
            'total_items' => $data->total(),
            'total_pages' => $data->lastPage(),
        ];
    }
}
