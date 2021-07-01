<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSrsStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('srs_staffs', function (Blueprint $table) {
            $table->bigIncrements('id');
           
            $table->string('name');
            $table->string('address');
            $table->string('ph');
            $table->string('dob');
            $table->string('email');
            $table->string('quali');
            $table->string('company_id');
            $table->string('location_id');

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
        Schema::dropIfExists('srs_staffs');
    }
}
