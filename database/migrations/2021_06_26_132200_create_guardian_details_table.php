<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardianDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardian_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_id');
           
            $table->string('gr_name');
            $table->string('gr_relation');
            $table->string('gr_lan');
            $table->string('gr_mob');
            $table->string('gr_email');
            $table->string('gr_address');

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
        Schema::dropIfExists('guardian_details');
    }
}
