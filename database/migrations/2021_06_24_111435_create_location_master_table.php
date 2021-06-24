<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_master', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('location_id');            
            $table->string('master_name');            
            $table->string('address');   
            $table->string('email');                     
            $table->string('ph');
            $table->string('fax');
            $table->string('web_id');                       
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
        Schema::dropIfExists('location_master');
    }
}
