<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username');
            $table->string('password');
            $table->string('email')->nullable();
            $table->string('national_id')->unique();
            $table->unsignedInteger('nationality_id')->nullable();
            $table->unsignedInteger('gender')->default(0);
            $table->string('mobile1');
            $table->string('mobile2')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('status')->default(0);
            $table->string('photo')->nullable();
            $table->text('note')->nullable();
            $table->unsignedInteger('role')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
