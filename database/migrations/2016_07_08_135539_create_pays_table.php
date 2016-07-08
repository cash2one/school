<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->comment('订单id');
            $table->integer('pay_type_id')->comment('支付方式');
            $table->integer('user_id')->comment('付款用户');
            $table->string('transaction_id')->comment('付款单号');
            $table->decimal('total',18,2)->comment('付款金额');
            $table->integer('created_at')->comment('付款时间');
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
        Schema::drop('pays');
    }
}
