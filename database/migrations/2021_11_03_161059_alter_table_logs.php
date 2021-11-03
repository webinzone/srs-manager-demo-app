<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('activity_logs', function (Blueprint $table) {
            $table->string('company_id')->nullable()->default(null);
            $table->string('location_id')->nullable()->default(null);
            $table->integer('user_id')->nullable();                     

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
