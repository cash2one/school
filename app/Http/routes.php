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

Route::auth();

Route::group(['prefix' => '/'],function(){

    Route::get('/',function(){
        return view('welcome');
    });


    /**
     * 后台管理
     */
    Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware' => ['auth']],function(){

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

        /**
         * 用户管理
         */
        Route::group(['prefix' => 'user'],function(){

            Route::get('/','UserController@index');

        });

        /**
         * 班级管理
         */
        Route::group(['prefix' => 'classes'],function(){

            Route::get('/','ClassesController@index');

            Route::get('add','ClassesController@add');

            Route::post('add','ClassesController@store');

            Route::get('delete/{id}','ClassesController@delete');

            Route::get('edit/{id}','ClassesController@edit');

            Route::post('edit','ClassesController@store');

            Route::get('/detail/{id}','ClassesController@detail');

        });

        /**
         * 学生管理
         */
        Route::group(['prefix' => 'student'],function(){

            Route::get('/','StudentController@index');

            Route::get('add/{id}','StudentController@add');

        });

        /**
         * 角色管理
         */
        Route::group(['prefix' => 'role'],function(){

            Route::get('/','RoleController@index');

        });

    });

});
