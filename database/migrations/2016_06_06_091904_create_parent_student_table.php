<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_student', function (Blueprint $table) {
            $table->integer('parent_id')->comment('父母id');
            $table->integer('student_id')->comment('学生id');
            $table->integer('bind_time')->comment('绑定时间');
            $table->integer('end_time')->default(0)->comment('到期时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('parent_student');
    }
}
