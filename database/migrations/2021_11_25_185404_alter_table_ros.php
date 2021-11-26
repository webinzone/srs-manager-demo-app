<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableRos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rosters', function (Blueprint $table) {
            
            $table->string('sunto')->nullable()->default(null);
            $table->string('monto')->nullable()->default(null);
            $table->string('tueto')->nullable()->default(null);
            $table->string('wedto')->nullable()->default(null);
            $table->string('thuto')->nullable()->default(null);
            $table->string('frito')->nullable()->default(null);
            $table->string('satto')->nullable()->default(null);
                        
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
