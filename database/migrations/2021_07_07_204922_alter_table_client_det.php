<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableClientDet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_details', function (Blueprint $table) {
            $table->string('other_income')->nullable()->default(null);
            $table->string('medi_no2')->nullable()->default(null);
            $table->string('start_period')->nullable()->default(null);
            $table->string('end_period')->nullable()->default(null);          

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
            $table->dropColumn('other_income');
            $table->dropColumn('medi_no2');
            $table->dropColumn('start_period');
            $table->dropColumn('end_period');

       });
    }
}
