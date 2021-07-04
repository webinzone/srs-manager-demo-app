<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableResidentAgreements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

          Schema::table('resident_agreements', function (Blueprint $table) {
            $table->string('amt_pay')->nullable()->default(null);
            $table->string('amt_res')->nullable()->default(null);
            $table->string('amt_est')->nullable()->default(null);
            $table->string('amt_adv')->nullable()->default(null);

           

       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('resident_agreements', function (Blueprint $table) {
            $table->dropColumn('amt_pay');
            $table->dropColumn('amt_res');
            $table->dropColumn('amt_est');
            $table->dropColumn('amt_adv');


       });

    }
}
