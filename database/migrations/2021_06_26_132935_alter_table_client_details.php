<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableClientDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::table('client_details', function (Blueprint $table) {
            $table->string('ref_by')->nullable()->default(null);
            $table->string('pre_address')->nullable()->default(null);
            $table->string('ent_no')->nullable()->default(null);
            $table->string('pen_exp')->nullable()->default(null);
            $table->string('respite')->nullable()->default(null);
            $table->string('weeks')->nullable()->default(null);
            $table->string('acc')->nullable()->default(null);
            $table->string('res_ph')->nullable()->default(null);
            $table->string('res_fax')->nullable()->default(null);
            $table->string('res_email')->nullable()->default(null);

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
            $table->dropColumn('ref_by');
            $table->dropColumn('pre_address');
            $table->dropColumn('ent_no');
            $table->dropColumn('pen_exp');
            $table->dropColumn('respite');
            $table->dropColumn('weeks');
            $table->dropColumn('acc');
            $table->dropColumn('res_ph');
            $table->dropColumn('res_fax');
            $table->dropColumn('res_email');

    });
    }
}
