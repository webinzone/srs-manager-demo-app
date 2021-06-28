<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableRsa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resident_agreements', function (Blueprint $table) {
            $table->string('res_gp')->nullable()->default(null);
            $table->string('asistance_status')->nullable()->default(null);
            $table->string('staff')->nullable()->default(null);
            $table->string('g_tel')->nullable()->default(null);
            $table->string('g_adress')->nullable()->default(null);
            $table->string('g_email')->nullable()->default(null);
            $table->string('per_tel')->nullable()->default(null);
            $table->string('per_address')->nullable()->default(null);
            $table->string('per_email')->nullable()->default(null);
            $table->string('emg_contact')->nullable()->default(null);
            $table->string('emg_tel')->nullable()->default(null);
            $table->string('emg_address')->nullable()->default(null);
            $table->string('emg_email')->nullable()->default(null);
            $table->string('amt_fee')->nullable()->default(null);
            $table->string('any_rent_adv')->nullable()->default(null);
            $table->string('est_fee')->nullable()->default(null);
            $table->string('refund')->nullable()->default(null);
            $table->string('srs_assist_status')->nullable()->default(null);
            $table->string('assist_amnt')->nullable()->default(null);
            $table->string('location_id')->nullable()->default(null);
            $table->string('company_id')->nullable()->default(null);
                       
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
            $table->dropColumn('res_gp');
            $table->dropColumn('asistance_status');
            $table->dropColumn('staff');
            $table->dropColumn('g_tel');
            $table->dropColumn('g_adress');
            $table->dropColumn('g_email');
            $table->dropColumn('per_tel');
            $table->dropColumn('per_address');
            $table->dropColumn('per_email');
            $table->dropColumn('emg_contact');
            $table->dropColumn('emg_tel');
            $table->dropColumn('emg_address');
            $table->dropColumn('emg_email');
            $table->dropColumn('amt_fee');
            $table->dropColumn('any_rent_adv');
            $table->dropColumn('est_fee');
            $table->dropColumn('refund');
            $table->dropColumn('srs_assist_status');
            $table->dropColumn('assist_amnt');
            $table->dropColumn('location_id');
            $table->dropColumn('company_id');
        });              
    }
}
