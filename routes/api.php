<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'PetugasController@register');
Route::post('login', 'PetugasController@login');
        Route::get('/', function(){
            return Auth::user()->level;
        })->middleware('jwt.verify');

Route::get('user','PetugasController@getAuthenticatedUser');


//pelanggan
Route::post('/simpan_penyewa','PenyewaController@store')->middleware('jwt.verify');
Route::put('/ubah_penyewa/{id}','PenyewaController@update')->middleware('jwt.verify');
Route::delete('/hapus_penyewa/{id}','PenyewaController@hapus')->middleware('jwt.verify');
Route::get('/tampil_penyewa','PenyewaController@tampil')->middleware('jwt.verify');