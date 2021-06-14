<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientGpdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_gpdetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gp_name');
            $table->string('address');
            $table->string('ph');
            $table->string('clinic_name');
            $table->string('booking_s_time');
            $table->string('booking_e_time');

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
        Schema::dropIfExists('client_gpdetails');
    }
}
