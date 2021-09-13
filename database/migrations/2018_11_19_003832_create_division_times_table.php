<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('division_times', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('section_id');
            $table->text('description');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->unsignedInteger('semester')->nullable();
            $table->unsignedInteger('level')->nullable();
            $table->string('pdf_file')->nullable();
            $table->timestamps();

            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('division_times');
    }
}
