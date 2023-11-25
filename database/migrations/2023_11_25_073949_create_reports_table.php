<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')->references('id')->on('provinces');

            $table->unsignedBigInteger('municipality_id');
            $table->foreign('municipality_id')->references('id')->on('municipalities');

            $table->unsignedBigInteger('quarter_id');
            $table->foreign('quarter_id')->references('id')->on('quarters');

            $table->unsignedBigInteger('program_id');
            $table->foreign('program_id')->references('id')->on('programs');

            $table->integer('male_count')->unsigned;
            $table->integer('female_count')->unsigned;
            $table->integer('total_physical_count')->unsigned;

            $table->double('total_budget_utilized', 10,2)->unsigned;


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
        Schema::dropIfExists('reports');
    }
}
