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
            $table->integer('category_id')->comment('学校类型');
            $table->string('name')->comment('学校名称');
            $table->string('icon')->comment('学校图标');
            $table->string('description')->comment('学校简介');
            $table->text('content')->comment('学校内容');
            $table->string('address')->comment('学校地址');
            $table->integer('people_number')->comment('学校人数');
            $table->string('principal')->comment('学校负责人');
            $table->string('principal_mobile')->comment('负责人联系方式');
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
        Schema::drop('schools');
    }
}
