<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => '/'],function(){

    Route::get('/',function(){
        return view('welcome');
    });


    /**
     * 后台管理
     */
    Route::group(['prefix' => 'admin','namespace' => 'Admin'],function(){

        Route::get('/','IndexController@index');

        /**
         * 学校管理
         */
        Route::group(['prefix' => 'school'],function(){

            Route::get('/','SchoolController@index');

            Route::get('add','SchoolController@add');

            Route::post('add','SchoolController@store');

            Route::get('delete/{id}','SchoolController@delete');

            Route::get('edit/{id}','SchoolController@edit');

            Route::post('edit','SchoolController@store');

        });

    });

});
