<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalHostServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_host_services', function (Blueprint $table) {
            $table->id();
            $table->string('available')->nullable();
            $table->string('local_host_id')->nullable();
            $table->string('place_id')->nullable();
            $table->string('feature')->nullable();
            $table->string('room_picture')->nullable();
            $table->double('rating',15,2)->nullable();
            $table->double('hotel_price',15,2)->nullable();
            $table->double('food_price',15,2)->nullable();
            $table->double('total_price',15,2)->nullable();
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
        Schema::dropIfExists('local_host_services');
    }
}
