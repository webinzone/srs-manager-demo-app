<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableVaccc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vaccates', function (Blueprint $table) {
            
            $table->string('p_nomini')->nullable()->default(null);
            $table->string('srs_name')->nullable()->default(null);
            $table->string('srs_addr')->nullable()->default(null);
            $table->string('pr_name')->nullable()->default(null);
            $table->string('pr_noti')->nullable()->default(null);
            $table->string('pr_posi')->nullable()->default(null);
            $table->string('pr_ph')->nullable()->default(null);
            $table->string('pr_adr')->nullable()->default(null);
    
            $table->string('ter_sec')->nullable()->default(null);
            $table->string('ter_sup')->nullable()->default(null);
            $table->string('ter_days')->nullable()->default(null);
            $table->string('ter_date')->nullable()->default(null);
            $table->string('act_date')->nullable()->default(null);

            $table->string('del_by')->nullable()->default(null);
            $table->string('ress_date')->nullable()->default(null);
            $table->string('nomini_by')->nullable()->default(null);
            $table->string('nom_date')->nullable()->default(null);
            $table->string('del_date')->nullable()->default(null);
            

       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vaccates', function (Blueprint $table) {
            
            $table->dropColumn('p_nomini');
            $table->dropColumn('srs_name');
            $table->dropColumn('srs_addr');
            $table->dropColumn('pr_name');
            $table->dropColumn('pr_noti');
            $table->dropColumn('pr_posi');
            $table->dropColumn('pr_ph');
            $table->dropColumn('pr_adr');
    
            $table->dropColumn('ter_sec');
            $table->dropColumn('ter_sup');
            $table->dropColumn('ter_days');
            $table->dropColumn('ter_date');
            $table->dropColumn('act_date');

            $table->dropColumn('del_by');
            $table->dropColumn('ress_date');
            $table->dropColumn('nomini_by');
            $table->dropColumn('nom_date');
            $table->dropColumn('del_date');
            

       });
    }
}
