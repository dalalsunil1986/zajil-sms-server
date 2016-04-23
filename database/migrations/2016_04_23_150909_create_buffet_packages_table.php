<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuffetPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buffet_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buffet_id');
            $table->text('description')->nullable();
            $table->decimal('price',5,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('buffet_packages');
    }
}
