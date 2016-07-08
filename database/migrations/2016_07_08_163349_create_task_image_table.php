<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_image', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id')->comment('作业id');
            $table->string('local_url')->comment('本地链接');
            $table->string('origin_url')->comment('远程链接');
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
        Schema::drop('task_image');
    }
}
