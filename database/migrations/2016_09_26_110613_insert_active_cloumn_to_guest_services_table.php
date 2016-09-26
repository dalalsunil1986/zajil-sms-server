<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertActiveCloumnToGuestServicesTable extends Migration
{
    public function up()
    {
        Schema::table('guest_services', function (Blueprint $table) {
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
        Schema::table('guest_services', function (Blueprint $table) {
            //
            $table->dropColumn('active');
        });
    }
}
