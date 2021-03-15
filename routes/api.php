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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['as' => 'api::'], function () {
    Route::group(['prefix' => 'empresa', 'as' => 'empresa::'], function () {
        Route::post('create/{count}', 'EmpresaController@create')->name('create');
        Route::put('update/{id}', 'EmpresaController@update')->name('update');
        Route::delete('delete/{id}', 'EmpresaController@delete')->name('delete');
        Route::get('get/{id}', 'EmpresaController@get')->name('get');
        Route::post('palindrome', 'EmpresaController@palindrome')->name('palindrome');
    });

    Route::group(['prefix' => 'envio', 'as' => 'envio::'], function () {
        Route::post('shipment', 'EnvioController@shipment')->name('shipment');
        Route::get('fibonacci', 'EnvioController@dividerCount')->name('fibonacci');
        Route::get('tracking/{count}', 'EnvioController@tracking')->name('tracking');
    });

    Route::group(['prefix' => 'salary', 'as' => 'salary::'], function () {
        Route::get('update', 'EmployeeController@updateSalary')->name('update');
    });
});
