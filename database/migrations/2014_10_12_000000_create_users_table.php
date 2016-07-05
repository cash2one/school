<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('自增长id');
            $table->string('name')->comment('用户名称');
            $table->string('email')->unique()->comment('用户邮箱');
            $table->string('password')->comment('用户密码');
            $table->string('openid')->nullable()->comment('用户开放id，单个公众号时可以作为唯一id使用');
            $table->string('unionid')->nullable()->comment('用户唯一id，多个公众好绑定到开放平台后作为唯一字段使用');
            $table->rememberToken()->comment('用户标示');
            $table->integer('created_at')->comment('创建时间');
            $table->integer('updated_at')->comment('更新时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
