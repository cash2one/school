<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id')->comment('自增长id');
            $table->integer('user_id')->comment('管理的用户id');
            $table->integer('type_id')->comment('学校类型');
            $table->string('name')->comment('学校名称');
            $table->string('icon')->default('/images/school_icon.png')->comment('学校图标');
            $table->string('description')->nullable()->comment('学校简介');
            $table->text('content')->nullable()->comment('学校内容');
            $table->string('address')->nullable()->comment('学校地址');
            $table->integer('people_number')->default(0)->comment('学校人数');
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
        Schema::drop('schools');
    }
}
