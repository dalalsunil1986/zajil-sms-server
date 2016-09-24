<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_users', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('user_id');
            $table->morphs('service');
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
        Schema::table('service_users', function (Blueprint $table) {
            //
            $table->drop();
        });
    }
}
