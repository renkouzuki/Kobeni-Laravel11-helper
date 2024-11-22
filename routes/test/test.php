<?php

use App\Http\Controllers\test;
use Illuminate\Support\Facades\Route;

Route::get('/test',[test::class , 'bruh']);