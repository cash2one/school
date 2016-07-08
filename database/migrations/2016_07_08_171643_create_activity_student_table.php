<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_student', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('activity_id')->comment('活动id');
            $table->integer('student_id')->comment('学生id');
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
        Schema::drop('activity_student');
    }
}
