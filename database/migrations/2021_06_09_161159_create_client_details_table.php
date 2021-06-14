<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('address');
            $table->string('dob');
            $table->string('cob');
            $table->string('age');
            $table->string('gender');
            $table->string('religion');
            $table->string('l_known');
            $table->string('ph');
            $table->string('medicard_no');
            $table->string('medicard_orderno');
            $table->string('pension_no');
            $table->string('insurance_no');
            $table->string('insu_compny');
            $table->string('likes');
            $table->string('dislikes');
            $table->string('hobies');
            
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
        Schema::dropIfExists('client_details');
    }
}
