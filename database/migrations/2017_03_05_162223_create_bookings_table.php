<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('vehicle_user_id')->unsigned();
            $table->string('pickup');
            $table->string('destination');
            $table->double('pickup_lat');
            $table->double('pickup_lng');
            $table->double('destination_lat');
            $table->double('destination_lng');
            $table->enum('status', ['pending', 'accepted', 'on-trip', 'completed'])->default('pending');
            $table->double('price');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
