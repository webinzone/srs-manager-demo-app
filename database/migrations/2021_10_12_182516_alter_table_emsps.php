<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEmsps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('srs_staffs', function (Blueprint $table) {
            
            $table->string('empdate')->nullable()->default(null);
            $table->string('empsign')->nullable()->default(null);

            

       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('srs_staffs', function (Blueprint $table) {
            
            $table->dropColumn('empdate');
            $table->dropColumn('empsign');

            

       });
    }
}
