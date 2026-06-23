<?php

use Illuminate\Support\Facades\Route;

Route::get('/chao', function () {
    return 'welcome to laravel';
});
Route::get('/chao/{name}',function($name){
 return 'Xin chào học viên: ' . $name;
});
Route::get('/test-layout', function () {
    return view('hello');
});