<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id')->comment('自增长id');
            $table->integer('user_id')->comment('用户id');
            $table->integer('school_id')->comment('学校id');
            $table->string('name')->comment('教师姓名');
            $table->string('teacher_id')->default(0)->comment('教师编号');
            $table->integer('sex_id')->comment('教师id');
            $table->string('mobile')->default(0)->comment('教师联系方式');
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
        Schema::drop('teachers');
    }
}
