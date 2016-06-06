<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id')->comment('自增长id');
            $table->integer('user_id')->default(0)->comment('用户id');
            $table->integer('school_id')->comment('学校id');
            $table->integer('grades_id')->comment('年级id');
            $table->integer('name')->comment('班级名称');
            $table->string('description')->comment('班级简介');
            $table->text('content')->comment('班级详情');
            $table->integer('created_at')->comment('创建时间');
            $table->integer('updated_at')->comment('更新时间');
            $table->integer('deleted_at')->comment('删除时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('classes');
    }
}
