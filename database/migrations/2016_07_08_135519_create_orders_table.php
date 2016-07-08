<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('用户id');
            $table->integer('student_id')->comment('学生id');
            $table->integer('grade_id')->comment('年级id');
            $table->integer('school_id')->comment('学校id');
            $table->integer('order_type_id')->comment('订单类型');
            $table->integer('status_id')->comment('订单状态');
            $table->string('name')->comment('订单名称');
            $table->string('number')->comment('订单编号');
            $table->decimal('total',18,2)->comment('订单金额');
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
        Schema::drop('orders');
    }
}
