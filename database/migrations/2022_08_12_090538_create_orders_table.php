<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->date('order_date');
            $table->string('username');
            $table->string('order_id');
            $table->text('customer_address');
            $table->string('customer_phone');
            $table->string('user_kelurahan');
            $table->string('user_kecamatan');
            $table->integer('cod_ammount');
            $table->enum('status_sending', ['sent', 'pending'])->default('pending');
            $table->enum('status_cod_ammount', ['paid', 'pending'])->default('pending');
            $table->enum('status_pod', ['pod', 'pending'])->default('pending');
            $table->enum('status_order', ['delivered', 'undelivered'])->default('undelivered');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
