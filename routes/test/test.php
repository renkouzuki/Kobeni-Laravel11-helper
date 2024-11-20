<?php

use App\Http\Controllers\Example1\test;
use Illuminate\Support\Facades\Route;

Route::get('/test',[test::class , 'index']);