<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNullableOnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */



    //  composer require doctrine/dbal 2.12.*
    // php artisan migrate


    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_national_id_unique');
            $table->string('national_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
