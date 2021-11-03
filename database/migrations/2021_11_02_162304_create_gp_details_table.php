<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGpDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gp_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('res_name');
            $table->string('res_id');
            $table->string('room');
            $table->string('bed');
            $table->string('dob');
            $table->string('category');
            $table->string('name');
            $table->string('address');
            $table->string('ph');
            $table->string('email');
                        
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
        Schema::dropIfExists('gp_details');
    }
}
