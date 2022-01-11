<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('check_id','FirestContrOller@check')->middleware(['check_token']);
Route::post('products','ProductController@createProduct');
Route::post('products/{prudectId}','ProductController@updatedProduct');
Route::get('products','ProductController@ListAllProduct');
Route::delete('products/{prudectId}','ProductController@DeleteProductById');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

