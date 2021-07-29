<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('res_name');
            $table->string('client_id');
            $table->string('adm_date');
            $table->string('tof');
            $table->string('rent_pay');
            $table->string('pay_date');
            $table->string('nextpay_date');
            $table->string('adv_pay');
            $table->string('status');
            $table->string('roomno');
            $table->string('room_type');            

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
        Schema::dropIfExists('rents');
    }
}
