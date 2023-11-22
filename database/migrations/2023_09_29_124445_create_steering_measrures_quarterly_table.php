<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSteeringMeasruresQuarterlyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steering_measrures_quarterly', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('steering_measures_id');
            $table->foreign('steering_measures_id')->references('id')->on('steering_measures');
            $table->unsignedBigInteger('quarter_id');
            $table->foreign('quarter_id')->references('id')->on('quarters');

    });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('steering_measrures_quarterly');
    }
}
