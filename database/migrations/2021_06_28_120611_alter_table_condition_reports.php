<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableConditionReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('condition_reports', function (Blueprint $table) {
            $table->string('res_name')->nullable()->default(null);
            $table->string('stf_name')->nullable()->default(null);
            $table->string('res_date')->nullable()->default(null);
            $table->string('item_no')->nullable()->default(null);
            $table->string('owned_by')->nullable()->default(null);
            $table->string('res_cond')->nullable()->default(null);
            $table->string('res_sign')->nullable()->default(null);
            $table->string('st_sign')->nullable()->default(null);

            
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
            $table->dropColumn('res_name');
            $table->dropColumn('stf_name');
            $table->dropColumn('res_date');
            $table->dropColumn('item_no');
            $table->dropColumn('owned_by');
            $table->dropColumn('res_cond');
            $table->dropColumn('res_sign');
            $table->dropColumn('st_sign');

            
    });
    }
}
