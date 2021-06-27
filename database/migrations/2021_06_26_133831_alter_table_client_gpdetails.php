<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableClientGpdetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_gpdetails', function (Blueprint $table) {
            $table->string('gp_lan')->nullable()->default(null);
            $table->string('gp_fax')->nullable()->default(null);
          

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_gpdetails', function (Blueprint $table) {
            $table->dropColumn('gp_lan');
            $table->dropColumn('gp_fax');
          

    });
    }
}
