<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferrals2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referrals2', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_id');

            $table->string('med1');
            $table->string('med1_det');
            $table->string('med2');
            $table->string('med2_det');
            $table->string('med3');
            $table->string('med3_det');
            $table->string('med4');
            $table->string('med4_det');
            $table->string('med5');
            $table->string('med5_det');
            $table->string('med6');
            $table->string('med6_det');
            $table->string('med7');
            $table->string('med7_det');
            $table->string('med8');
            $table->string('med8_det');
            $table->string('med9');
            $table->string('med9_det');
            $table->string('med10');
            $table->string('med10_det');
            $table->string('med11');
            $table->string('med11_det');
            $table->string('med12');
            $table->string('med12_det');
            $table->string('med13');
            $table->string('med13_det');
            $table->string('med14');
            $table->string('med14_det');
            $table->string('med15');
            $table->string('med15_det');
            $table->string('med16');
            $table->string('med16_det');
            $table->string('med17');
            $table->string('med17_det');
            $table->string('med18');
            $table->string('med18_det');
            $table->string('p1');
            $table->string('p2');
            $table->string('p3');
            $table->string('p4');
            $table->string('p5');
            $table->string('p6');
            $table->string('p7');
            $table->string('p8');
            $table->string('p9');
            $table->string('p10');
            $table->string('a1');
            $table->string('a2');
            $table->string('a3');
            $table->string('a_comments');
            $table->string('public_trans');
            $table->string('app_keep');
            $table->string('social_activity');
            $table->string('hobbies');
            $table->string('case_name');
            $table->string('case_org');
            $table->string('case_email');
            $table->string('case_ph');
            $table->string('case_addr');
            $table->string('serv_per');
            $table->string('serv_org');
            $table->string('serv_adr');
            $table->string('serv_email');
            $table->string('serv_ph');
            $table->string('addserv_per');
            $table->string('addserv_org');
            $table->string('addserv_adr');
            $table->string('addserv_email');
            $table->string('addserv_ph');
            $table->string('other_relev');
            $table->string('rel_name');
            $table->string('rel_pos');
            $table->string('rel_org');
            $table->string('rel_date');            
           
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
        Schema::dropIfExists('referrals2');
    }
}
