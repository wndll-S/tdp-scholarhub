<?php

use App\Http\Controllers\Api\V1\AdminController;
use App\Http\Controllers\Api\V1\ApplicationController;
use App\Http\Controllers\Api\V1\DocumentController;
use App\Http\Controllers\Api\V1\LoginDetailController;
use App\Http\Controllers\Api\V1\StudentController;
use App\Http\Controllers\Api\V1\StudentAddressController;
use App\Models\LoginDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function(){
    Route::apiResource('student', StudentController::class);
    Route::apiResource('application', ApplicationController::class);
    Route::apiResource('loginDetail', LoginDetailController::class);
    Route::apiResource('admin', AdminController::class);
    Route::apiResource('studentAddress', StudentAddressController::class);
    Route::apiResource('document', DocumentController::class);
});