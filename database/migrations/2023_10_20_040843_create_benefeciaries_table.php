<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenefeciariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaries', function (Blueprint $table) {

            $table->id();

            // name
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->string('prefix')->nullable();
            $table->string('gender');
            $table->string('email')->unique()->nullable();
            // birth
            $table->year('birth_year')->nullable();
            $table->unsignedTinyInteger('birth_month')->nullable();
            $table->unsignedTinyInteger('birth_day')->nullable();

            // address
            // $table->unsignedBigInteger('province_id');
            // $table->foreign('province_id')->references('id')->on('provinces');

            // $table->unsignedBigInteger('municipality_id');
            // $table->foreign('municipality_id')->references('id')->on('municipalities');

            // $table->unsignedBigInteger('barangay_id');
            // $table->foreign('barangay_id')->references('id')->on('barangays');

            // $table->string('region')->nullable();
            // $table->string('province')->nullable();
            // $table->string('municipality')->nullable();
            // $table->string('barangay')->nullable();
            // $table->string('purok')->nullable();
            // $table->string('subdivision')->nullable();

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
        Schema::dropIfExists('benefeciaries');
    }
}
