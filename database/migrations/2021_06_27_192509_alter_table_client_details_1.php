<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableClientDetails1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('client_details', function (Blueprint $table) {
            $table->string('nationality')->nullable()->default(null);
            $table->string('adm_date')->nullable()->default(null);
            $table->string('room_no')->nullable()->default(null);
            
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('client_details', function (Blueprint $table) {
            $table->dropColumn('nationality');
            $table->dropColumn('adm_date');
            $table->dropColumn('room_no');
            
    });
    }
}
