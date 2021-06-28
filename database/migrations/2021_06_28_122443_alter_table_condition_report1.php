<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableConditionReport1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('condition_reports', function (Blueprint $table) {
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
         Schema::table('condition_reports', function (Blueprint $table) {
            $table->dropColumn('company_id');
            $table->dropColumn('location_id');
           
            
    });
    }
}
