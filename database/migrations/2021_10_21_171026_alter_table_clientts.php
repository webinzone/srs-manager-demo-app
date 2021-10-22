<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableClientts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('client_details', function (Blueprint $table) {
            $table->string('nok_taxi')->nullable()->default(null);
            $table->string('nok_exp')->nullable()->default(null);
            $table->string('nok_other')->nullable()->default(null);
            $table->string('nok_adr')->nullable()->default(null);
            $table->string('nok_up')->nullable()->default(null);
            $table->string('nok_noti')->nullable()->default(null);
            $table->string('nok_em')->nullable()->default(null);
            $table->string('nok_st')->nullable()->default(null);
            $table->string('nok_dt')->nullable()->default(null);

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
