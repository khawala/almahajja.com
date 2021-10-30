<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('period_id')->nullable();
            $table->integer('supervisor_id')->nullable();
            $table->string('category')->nullable();
            $table->string('track')->nullable();
            $table->string('pdf_file')->nullable();
            $table->timestamps();

            // $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            // $table->foreign('supervisor_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
