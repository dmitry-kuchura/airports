<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->bigIncrements('id')->primary('flights_pkey');

            $table->string('flight_number');
            $table->integer('transporter_id');
            $table->integer('departure_airport_id');
            $table->integer('arrival_airport_id');
            $table->date('departure_at');
            $table->date('arrival_at');

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
        Schema::dropIfExists('flights');
    }

}
