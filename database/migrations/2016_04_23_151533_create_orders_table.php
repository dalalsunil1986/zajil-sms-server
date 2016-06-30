<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->integer('message_id')->nullable();
            $table->text('message_text')->nullable();
            $table->timestamp('message_send_date')->nullable();
            $table->integer('buffet_package_id')->nullable();
            $table->integer('hall_id')->nullable();
            $table->integer('photographer_id')->nullable();
            $table->integer('guest_service_id')->nullable();
            $table->integer('light_service_id')->nullable();
            $table->string('secret_token')->nullable();
            $table->enum('status',['pending','failed','success'])->default('pending');
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
        Schema::drop('orders');
    }
}
