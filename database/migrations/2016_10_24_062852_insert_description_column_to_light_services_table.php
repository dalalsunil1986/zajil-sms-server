<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertDescriptionColumnToLightServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('light_services', function (Blueprint $table) {
            $table->addColumn('text','description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('light_services', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
}
