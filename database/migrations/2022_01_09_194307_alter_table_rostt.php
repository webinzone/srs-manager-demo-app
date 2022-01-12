<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableRostt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rosters', function (Blueprint $table) {
            
            $table->string('sun_leav')->nullable()->default(null);
            $table->string('mon_leav')->nullable()->default(null);
            $table->string('tues_leav')->nullable()->default(null);
            $table->string('wed_leav')->nullable()->default(null);
            $table->string('thur_leav')->nullable()->default(null);
            $table->string('fri_leav')->nullable()->default(null);
            $table->string('sat_leav')->nullable()->default(null);

            

       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
