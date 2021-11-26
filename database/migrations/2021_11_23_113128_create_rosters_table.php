<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRostersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rosters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('p_from');
            $table->string('p_to');
            $table->string('mngr');
            $table->string('a_mngr');
            $table->string('c_oofr');
            $table->string('e_name');
            $table->string('e_pos');
            $table->string('sun');
            $table->string('mon');
            $table->string('tue');
            $table->string('wed');
            $table->string('thu');
            $table->string('fri');
            $table->string('sat');
            $table->string('tot_hr');

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
        Schema::dropIfExists('rosters');
    }
}
