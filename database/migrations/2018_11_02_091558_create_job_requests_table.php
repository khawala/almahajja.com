<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('job_id');
            $table->string('name');
            $table->string('mobile');
            $table->unsignedInteger('nationality_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('deparment_id')->nullable();
            $table->text('cv_description')->nullable();
              $table->text('note')->nullable();
            $table->unsignedInteger('status');
            $table->timestamps();

            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_requests');
    }
}
