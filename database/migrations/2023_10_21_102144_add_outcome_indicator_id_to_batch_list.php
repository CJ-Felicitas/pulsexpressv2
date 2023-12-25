<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOutcomeIndicatorIdToBatchList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('batch_list', function (Blueprint $table) {
        //     $table->unsignedBigInteger('outcome_indicator_id');
        //     $table->foreign('outcome_indicator_id')->references('id')->on('outcome_indicator_title');

        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('batch_list', function (Blueprint $table) {
            //
        });
    }
}
