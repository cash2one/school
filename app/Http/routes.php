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

Route::any('/pay/notify','Home\PayController@notify');

/**
 * 开放平台路由组
 */
Route::group(['prefix' => '/open','namespace' => 'Open'],function(){

    /**
     * 微信开放平台
     */
    Route::group(['prefix' => 'wechat'],function(){

        Route::any('/','WechatController@index');

        Route::get('menu','WechatController@menu');

        Route::get('test','WechatController@test');

    });

});

Route::group(['prefix' => '/',['middleware' => 'hasClient']],function(){

    Route::group(['middleware' => 'oauth'],function(){

        /**
         * 前台路由
         */
        Route::group(['prefix' => '/','namespace' => 'Home'],function(){

            Route::get('/','IndexController@index');

            Route::group(['prefix' => 'student'],function(){

                Route::get('bind','StudentController@bind');

                Route::post('getCode','StudentController@getCode');

                Route::post('bind','StudentController@store');

            });

            Route::group(['prefix' => 'bind'],function(){

                Route::get('teacher','TeacherController@bind');

                Route::post('teacher','TeacherController@save');

            });

            /**
             * 订单
             */
            Route::group(['prefix' => 'order'],function(){

                Route::get('buy/{id}','OrderController@buy');

                Route::post('buy','OrderController@save');

            });

            /**
             * 支付
             */
            Route::group(['prefix' => 'pay'],function(){

                Route::get('wechat/{id}','PayController@wechat');

                Route::get('status/{id}','PayController@status');

            });

        });

        /**
         * 家庭中心
         */
        Route::group(['prefix'=>'/family','namespace' => 'Family','middleware' => ['family']],function (){

            Route::get('/','IndexController@index');

            /**
             * 学生
             */
            Route::group(['prefix' => 'student'],function (){

                Route::get('/','StudentController@index');

                Route::get('detail/{id}','StudentController@detail');

            });

            /**
             * 考试
             */
            Route::group(['prefix' => 'exam'],function(){

                Route::get('student/{id}','ExamController@student');

                Route::get('detail/{id}/{sid}','ExamController@detail');

            });

            /**
             * 作业
             */
            Route::group(['prefix' => 'task'],function(){

                Route::get('student/{id}','TaskController@student');

                Route::get('detail/{id}','TaskController@detail');

            });

            /**
             * 活动
             */
            Route::group(['prefix' => 'activity'],function(){

                Route::get('student/{id}','ActivityController@student');

                Route::get('detail/{id}/{sid}','ActivityController@detail');

                Route::post('score','ActivityController@score');

            });

            /**
             * 消息
             */
            Route::group(['prefix' => 'message'],function(){

                Route::get('/','MessageController@index');

                Route::get('add/{id}','MessageController@add');

                Route::post('add','MessageController@store');

                Route::get('detail/{id}','MessageController@detail');

                Route::get('read','MessageController@read');

                Route::get('unread','MessageController@unread');

            });

            /**
             * 新闻
             */
            Route::group(['prefix' => 'news'],function (){

                Route::get('/','NewsController@index');

            });

        });

        /**
         * 教师中心
         */
        Route::group(['prefix' => '/teacher','namespace' => 'Teacher','middleware' => ['teacher']],function(){

            Route::get('/','IndexController@index');

            /**
             * 班级
             */
            Route::group(['prefix' => 'classes'],function(){

                Route::get('/','ClassesController@index');

            });

            /**
             * 课程
             */
            Route::group(['prefix' => 'course'],function(){

                Route::get('detail/{id}','CourseController@detail');

            });

            /**
             * 作业
             */
            Route::group(['prefix' => 'task'],function(){

                Route::get('/','TaskController@index');

                Route::get('add','TaskController@add');

                Route::post('add','TaskController@store');

                Route::get('detail/{id}','TaskController@detail');

            });

            /**
             * 消息
             */
            Route::group(['prefix' => 'message'],function(){

                Route::get('/','MessageController@index');

                Route::get('read','MessageController@read');

                Route::get('unread','MessageController@unread');

                Route::get('detail/{id}','MessageController@detail');

            });

            /**
             * 活动
             */
            Route::group(['prefix' => 'activity'],function(){

                Route::get('/','ActivityController@index');

                Route::get('add','ActivityController@add');

                Route::post('add','ActivityController@store');

                Route::get('detail/{id}','ActivityController@detail');

                Route::get('score/{id}/{score}','ActivityController@score');

            });

            Route::group(['prefix' => 'news'],function(){

                Route::get('add','NewsController@add');

                Route::post('add','NewsController@store');

            });

        });
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

            Route::get('detail/{id}','SchoolController@detail');

            Route::get('setting','SchoolController@setting');

            Route::post('setting','SchoolController@saveSetting');

        });

        /**
         * 年级管理
         */
        Route::group(['prefix' => 'grade'],function(){

            Route::get('/','GradeController@index');

            Route::get('add','GradeController@add');

            Route::post('add','GradeController@store');

            Route::get('edit/{id}','GradeController@edit');

            Route::post('edit','GradeController@store');

            Route::get('delete/{id}','GradeController@delete');

            Route::get('detail/{id}','GradeController@detail');

        });

        /**
         * 课程管理
         */
        Route::group(['prefix' => 'course'],function(){

            Route::get('classes/{id}','CourseController@classes');

            Route::get('add/{id}','CourseController@add');

            Route::post('add','CourseController@store');

            Route::get('edit/{id}','CourseController@edit');

            Route::post('edit','CourseController@store');

            Route::get('delete/{id}','CourseController@delete');

        });

        /**
         * 教师管理
         */
        Route::group(['prefix' => 'teacher'],function(){

            Route::get('/','TeacherController@index');

            Route::get('add','TeacherController@add');

            Route::post('add','TeacherController@store');

            Route::get('edit/{id}','TeacherController@edit');

            Route::post('edit','TeacherController@store');

            Route::get('delete/{id}','TeacherController@delete');

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

            Route::post('add','StudentController@store');

            Route::get('edit/{id}','StudentController@edit');

            Route::post('edit','StudentController@store');

            Route::get('delete/{id}','StudentController@delete');

        });

        /**
         * 考试管理
         */
        Route::group(['prefix' => 'exam'],function(){

            Route::get('classes/{id}','ExamController@classes');

            Route::get('add/{id}','ExamController@add');

            Route::post('add','ExamController@store');

            Route::get('edit/{id}','ExamController@edit');

            Route::get('detail/{id}','ExamController@detail');

        });

        Route::group(['prefix' => 'score'],function(){

            Route::get('add/{id}','ScoreController@add');

            Route::post('add','ScoreController@store');

            Route::post('edit','ScoreController@edit');

        });

        /**
         * 角色管理
         */
        Route::group(['prefix' => 'role'],function(){

            Route::get('/','RoleController@index');

        });

    });

});
