<?php

namespace App\Http\Controllers;

use App\Koobeni;
use App\Models\User;
use Exception;

class test extends Koobeni
{
    public function bruh()
    {
        try {
            $data = $this->findAll->allWithPagination(User::class, 'latest', 5, null, ['name', 'phone_number', 'location', 'image']);
            return $this->paginationDataResponse($data);
        } catch (Exception $e) {
            return $this->handleException($e, $this->req);
        }
    }
}
