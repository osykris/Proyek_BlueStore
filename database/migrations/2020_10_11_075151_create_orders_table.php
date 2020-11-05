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
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('ongkir_id')->unsigned()->default(0);
            $table->foreign('ongkir_id')->references('id')->on('ongkirs')->onDelete('cascade')->onUpdate('cascade');
            $table->text('Shipaddress')->default(null);
            $table->string('namaKota')->default(null);
            $table->integer('tarif')->default(null);
            $table->integer('resiPengiriman')->default(null);
            $table->string('status')->default('pending');
            $table->integer('total_price');
            $table->date('order_date');
            $table->integer('code_unic');       
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
