<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('orders', function (Blueprint $table) {
//            $table->dropColumn('amount');
//            $table->decimal('amount',5,2);
            DB::statement('ALTER TABLE orders MODIFY COLUMN amount VARCHAR(255) ');
            //
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('orders', function (Blueprint $table) {
            //
            DB::statement('ALTER TABLE orders MODIFY COLUMN amount FLOAT(5,2) ');
//        });
    }
}
