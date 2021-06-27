<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableClientNextofkin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('client_nextofkin', function (Blueprint $table) {
            $table->string('nok_lan')->nullable()->default(null);
            $table->string('nok_fax')->nullable()->default(null);
          

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_nextofkin', function (Blueprint $table) {
            $table->dropColumn('nok_lan');
            $table->dropColumn('nok_fax');
          

    });
    }
}
