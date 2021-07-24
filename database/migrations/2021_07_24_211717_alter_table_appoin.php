<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAppoin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('appointments', function (Blueprint $table) {
            $table->string('client_id')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
            


       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn('client_id');
            $table->dropColumn('status');
            


       });
    }
}
