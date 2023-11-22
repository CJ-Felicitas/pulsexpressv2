<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicalCountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_count', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->unsignedBigInteger('program_id');
            $table->foreign('program_id')->references('id')->on('programs');
            $table->unsignedBigInteger('municipality_id');
            $table->foreign('municipality_id')->references('id')->on('municipalities');
            $table->unsignedBigInteger('barangay_id');
            $table->foreign('barangay_id')->references('id')->on('barangays');
            $table->unsignedBigInteger('quarters_id');
            $table->foreign('quarters_id')->references('id')->on('quarters');
            $table->unsignedBigInteger('reason_of_variance_id');
            $table->foreign('reason_of_variance_id')->references('id')->on('reason_of_variance');
            $table->unsignedBigInteger('steering_measures_id');
            $table->foreign('steering_measures_id')->references('id')->on('steering_measures');
            $table->year('year');
            $table->integer('male');
            $table->integer('female');
            $table->double('total_budget_utilization', 8, 2);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('physical_count');
    }
}
