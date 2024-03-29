<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('registration_id');
            $table->unsignedInteger('section_id');
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('month');
            $table->unsignedInteger('semester');
            $table->unsignedInteger('level');
            $table->float('mark1')->nullable();
            $table->float('mark2')->nullable();
            $table->float('mark3')->nullable();
            $table->float('total')->nullable();
            $table->text('separate_section')->nullable();
       
            // $table->softDeletes();
            $table->timestamps();

            $table->foreign('registration_id')->references('id')->on('registrations')->onDelete('cascade');
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
        Schema::dropIfExists('marks');
    }
}
