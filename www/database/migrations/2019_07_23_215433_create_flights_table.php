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
            $table->bigIncrements('id');

            $table->string('flight_number');
            $table->integer('transporter_id');
            $table->integer('departure_airport_id');
            $table->integer('arrival_airport_id');
            $table->timestamp('departure_at');
            $table->timestamp('arrival_at');

            $table->index(['departure_airport_id', 'arrival_airport_id']);

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
