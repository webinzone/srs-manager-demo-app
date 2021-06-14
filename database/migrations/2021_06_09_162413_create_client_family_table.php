<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_family', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_id');
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('relation');
            $table->string('address');
            $table->string('gender');
            $table->string('ph');
            $table->string('email');
            $table->string('country');
            $table->string('religion');
            
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
        Schema::dropIfExists('client_family');
    }
}
