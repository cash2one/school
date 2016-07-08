<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('classes_id')->comment('班级id');
            $table->integer('teacher_id')->comment('发布的老师id');
            $table->integer('grade_id')->comment('年级id');
            $table->integer('school_id')->comment('学校id');
            $table->integer('course_id')->comment('课程id');
            $table->string('name')->comment('作业名称');
            $table->string('detail')->comment('作业内容');
            $table->string('completed_at')->comment('完成时间');
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
        Schema::drop('tasks');
    }
}
