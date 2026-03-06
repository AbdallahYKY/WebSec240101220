<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prime', function () {
    return view('prime');
});
Route::get('/multable', function () {
    return view('multable');
});
Route::get('/even', function () {
    return view('even');
});