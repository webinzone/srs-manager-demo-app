<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('res_name');
            $table->string('client_id');
            $table->string('v_date');
            $table->string('address');
            $table->string('gender');
            $table->string('dob');
            $table->string('ph');
            $table->string('email');
            $table->string('reason');
            $table->string('roomno');
            $table->string('ex_date');
            $table->string('al_res');
            $table->string('f_addr');

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
        Schema::dropIfExists('vaccates');
    }
}
