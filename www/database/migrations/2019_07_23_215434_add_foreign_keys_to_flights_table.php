<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFlightsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->foreign('transporter_id', 'flights_transporter_id')->references('id')->on('transporters')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('departure_airport_id', 'flights_departure_airport_id')->references('id')->on('airports')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->dropForeign('flights_transporter_id');
            $table->dropForeign('flights_departure_airport_id');
        });
    }

}
