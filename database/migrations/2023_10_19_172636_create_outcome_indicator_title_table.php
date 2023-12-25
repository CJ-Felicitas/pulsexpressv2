<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutcomeIndicatorTitleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('outcome_indicator_title', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('title');
        //     $table->unsignedBigInteger('outcome_indicator');
        //     $table->foreign('outcome_indicator')->references('id')->on('outcome_indicator_main');
        //     $table->timestamp('created_at')->useCurrent();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outcome_indicator_title');
    }
}
