<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
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
            $table->string('tourist_id')->nullable();
            $table->string('place_id')->nullable();
            $table->string('lg_service_id')->nullable();
            $table->string('lh_service_id')->nullable();
            $table->double('amount_of_day',15,2)->nullable();
            $table->integer('amount_of_person')->nullable();
            $table->double('total_cost',15,2)->nullable();
            $table->string('payment_method')->nullable();
            $table->string('order_date')->nullable();
            $table->string('service_date')->nullable();
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
