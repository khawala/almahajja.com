<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('section_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('level_id')->nullable();
            $table->unsignedInteger('teacher_id')->nullable();
            $table->string('pdf_file')->nullable();
            $table->string('batch')->nullable();
            $table->unsignedInteger('price')->nullable();
            $table->unsignedInteger('status')->nullable();
            $table->unsignedInteger('gender')->nullable();
            $table->string('activity')->nullable();
            $table->unsignedInteger('type')->default(0);
            $table->string('photo')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            
            $table->text('note')->nullable();
            $table->timestamps();

            // $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            // $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classrooms');
    }
}
