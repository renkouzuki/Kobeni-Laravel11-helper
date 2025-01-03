<?php

namespace Storage\utils;

trait CustomResponse
{
    public function dataResponse($data, $message = 'Successfully')
    {
        $response = [
            'success' => true,
            'message' => $message,
        ];

        if($data !== null) {
            $response['data'] = $data;
        }

        return response()->json($response, 200);
    }

    public function paginationResponse($data)
    {
        return [
            'current_page' => $data->currentPage(),
            'page_size' => $data->perPage(),
            'total_items' => $data->total(),
            'total_pages' => $data->lastPage(),
        ];
    }

    public function paginationDataResponse($data, $message = 'Successfully')
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data->items(),
            'pagination' => $this->paginationResponse($data),
        ], 200);
    }

    public function createdResponse($data, $message = 'Successfully')
    {
        $response = [
            'success' => true,
            'message' => $message,
        ];

        if($data !== null) {
            $response['data'] = $data;
        }

        return response()->json($response, 201);
    }
}
