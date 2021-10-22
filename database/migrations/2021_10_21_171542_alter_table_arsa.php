<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableArsa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('resident_agreements', function (Blueprint $table) {
            $table->string('adm_name')->nullable()->default(null);
            $table->string('adm_ph')->nullable()->default(null);
            $table->string('adm_em')->nullable()->default(null);
            $table->string('adm_adr')->nullable()->default(null);
            $table->string('nok_det')->nullable()->default(null);
            $table->string('st_typ')->nullable()->default(null);
            $table->string('crn_no')->nullable()->default(null);
            $table->string('oth_dt')->nullable()->default(null);
            $table->string('typ_sup')->nullable()->default(null);
            $table->string('pr_name')->nullable()->default(null);
            $table->string('pr_wit')->nullable()->default(null);
            $table->string('pr_date')->nullable()->default(null);            

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
