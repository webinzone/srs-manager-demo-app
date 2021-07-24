<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('con_name');
            $table->string('refer_name');
            $table->string('r_date');
            $table->string('rep_name');
            $table->string('relation');
            $table->string('email');
            $table->string('ph');
            $table->string('reason');
            $table->string('appr_becoz');
            $table->string('ref_date');
            $table->string('ref_posi');
            $table->string('ref_agency');
            $table->string('ref_email');
            $table->string('ref_ph');
            $table->string('cfname');
            $table->string('csurname');
            $table->string('cdob');
            $table->string('cgender');
            $table->string('creligion');
            $table->string('cph');
            $table->string('cemail');
            $table->string('caddress');
            $table->string('csrs_name');
            $table->string('csrs_ph');
            $table->string('csrs_insu');
            $table->string('csrs_refno');
            $table->string('nok_name');
            $table->string('nok_relation');
            $table->string('nok_address');
            $table->string('nok_email');
            $table->string('nok_ph');
            $table->string('gp_name');
            $table->string('gp_address');
            $table->string('gp_ph');
            $table->string('gp_fax');
            $table->string('gp_email');
            $table->string('gua_refno');
            $table->string('gua_name');
            $table->string('gua_addr');
            $table->string('gua_email');
            $table->string('gua_ph');
            $table->string('ad_name');
            $table->string('ad_refno');
            $table->string('ad_addr');
            $table->string('ad_email');
            $table->string('ad_ph');
            $table->string('pen_type');
            $table->string('pen_refno');
            $table->string('pen_medino');
            $table->string('pen_mediexp');
            $table->string('pen_taxi');
            $table->string('pen_taxiexp');
            $table->string('medi_drugname');
            $table->string('medi_dose');
            $table->string('medi_freq');
            $table->string('medi_duration');
            $table->string('medi_lasttaken');
            $table->string('c_medi');
            $table->string('c_ownmedi');
            $table->string('c_medisideeffect');
            $table->string('ph_status');
            $table->string('cogi_status');
            $table->string('dis_primary');
            $table->string('dis_casemngr');
            $table->string('dis_org');
            $table->string('dis_email');
            $table->string('dis_ph');
            $table->string('ment_status');
            $table->string('ment_casemngr');
            $table->string('ment_org');
            $table->string('ment_email');
            $table->string('ment_ph');
            $table->string('behav_harm');
            $table->string('behav_details');
            $table->string('triger');
            
          
            $table->string('company_id')->nullable()->default(null);
            $table->string('location_id')->nullable()->default(null);
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referrals');
    }
}
