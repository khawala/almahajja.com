<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_registrations', function (Blueprint $table) {
           $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('section_id');
            $table->unsignedInteger('telecom_id')->nullable();
            $table->unsignedInteger('period_id')->nullable();
            $table->unsignedInteger('activity_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('level_id')->nullable();
            $table->unsignedInteger('classroom_id')->nullable();
            $table->unsignedInteger('paid')->default(0)->nullable();
            $table->unsignedInteger('level_old')->nullable();
            $table->unsignedInteger('status');
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->text('note')->nullable();
             $table->integer('payment_type')->default(0)->comment('1-online, 2 - receipt, 3 - Offline');
             $table->string('reference_no')->nullable();
            $table->string('receipt_image')->nullable();
              $table->json('payment_data')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('telecom_id')->references('id')->on('telecoms')->onDelete('cascade');
            $table->foreign('period_id')->references('id')->on('periods')->onDelete('cascade');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_registrations');
    }
}
