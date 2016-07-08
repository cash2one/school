<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activitys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('用户id');
            $table->integer('classes_id')->comment('班级id');
            $table->integer('grade_id')->comment('年级id');
            $table->integer('school_id')->comment('学校id');
            $table->integer('teacher_id')->comment('教师id');
            $table->string('name')->comment('活动名称');
            $table->text('detail')->comment('活动内容');
            $table->integer('start_at')->comment('开始时间');
            $table->integer('end_at')->comment('结束时间');
            $table->integer('created_at')->comment('创建时间');
            $table->integer('updated_at')->comment('更新时间');
            $table->integer('deleted_at')->nullable()->comment('删除时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('activitys');
    }
}
