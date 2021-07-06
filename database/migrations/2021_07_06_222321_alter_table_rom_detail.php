<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableRomDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('room_details', function (Blueprint $table) {
            $table->string('r_id')->nullable()->default(null);

            $table->string('company_id')->nullable()->default(null);
            $table->string('location_id')->nullable()->default(null);
            

            
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_details', function (Blueprint $table) {
            $table->dropColumn('r_id');

            $table->dropColumn('company_id');
            $table->dropColumn('location_id');
            

            
    });
    }
}
