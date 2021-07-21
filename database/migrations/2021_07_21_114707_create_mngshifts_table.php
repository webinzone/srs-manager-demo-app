<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMngshiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mngshifts', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('mng_staff');
            $table->string('evng_staff');
            $table->string('res_name');
            $table->string('room');
            $table->string('notes');
            $table->string('mng_date');
           
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
        Schema::dropIfExists('mngshifts');
    }
}
