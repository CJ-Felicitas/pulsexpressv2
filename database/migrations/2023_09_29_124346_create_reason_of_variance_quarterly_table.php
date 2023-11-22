<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReasonOfVarianceQuarterlyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reason_of_variance_quarterly', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reason_of_variance_id');
            $table->foreign('reason_of_variance_id')->references('id')->on('reason_of_variance');
            $table->unsignedBigInteger('quarter_id');
            $table->foreign('quarter_id')->references('id')->on('quarters');
            $table->longText('reason');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reason_of_variance_quarterly');
    }
}
