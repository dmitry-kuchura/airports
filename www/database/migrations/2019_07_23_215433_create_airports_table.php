<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirportsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('key', 3)->nullable();
            $table->string('name')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('timezone')->nullable();

            $table->index(['key']);

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
        Schema::dropIfExists('airports');
    }

}
