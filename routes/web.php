<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/register', function () {
    return view('scholars/register');
});
Route::get('/login', function () {
    return view('scholars/login');
});
Route::get('/admin', function () {
    return view('admins/dashboard');
});
Route::get('/admin/applications', function () {
    return view('admins/applications');
});
Route::get('/admin/scholars', function () {
    return view('admins/scholars');
});
Route::get('/admin/schools', function () {
    return view('admins/schools');
});
Route::get('/admin/login', function () {
    return view('admins/login');
});
