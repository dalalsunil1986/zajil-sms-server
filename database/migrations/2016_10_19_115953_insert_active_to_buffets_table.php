<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertActiveToBuffetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buffet_packages', function (Blueprint $table) {
            //
            $table->addColumn('boolean','active')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buffet_packages', function (Blueprint $table) {
            //
            $table->dropColumn('active');
        });
    }
}
