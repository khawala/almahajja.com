<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->increments('id');
            $table->text('about_almahajja_waqf')->nullable();
            $table->text('about_almahajja_project')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->text('values')->nullable();
            $table->text('goals')->nullable();
            $table->text('history')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
             $table->string('whatsapp')->nullable();
             
               $table->string('malath_username')->nullable();
            $table->string('malath_password')->nullable();
            $table->string('malath_sender_name')->nullable();

            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('toll_free')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('address')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('configurations');
    }
}
