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
            $table->string('trans_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->integer('message_id')->nullable();
            $table->text('message_text')->nullable();
            $table->integer('buffet_package_id')->nullable();
            $table->integer('hall_id')->nullable();
            $table->integer('photographer_id')->nullable();
            $table->integer('guest_service_id')->nullable();
            $table->integer('light_service_id')->nullable();
            $table->timestamp('message_date')->nullable();
            $table->timestamp('buffet_date')->nullable();
            $table->timestamp('hall_date')->nullable();
            $table->timestamp('photographer_date')->nullable();
            $table->timestamp('guest_service_date')->nullable();
            $table->timestamp('light_service_date')->nullable();
            $table->string('secret_token')->nullable();
            $table->string('amount')->nullable();
            $table->enum('status',['pending','failed','success'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
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
