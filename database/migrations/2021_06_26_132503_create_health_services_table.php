<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_id');
           
            $table->string('hs_name');
            $table->string('hs_address');
            $table->string('hs_lan');
            $table->string('aftr_hrs');
            $table->string('hs_fax');
            $table->string('hs_email');
            $table->string('med_history');

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
        Schema::dropIfExists('health_services');
    }
}
