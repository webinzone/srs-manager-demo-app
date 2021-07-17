<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableClientsDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('client_details', function (Blueprint $table) {
            $table->string('inc_sname')->nullable()->default(null);
            $table->string('inc_phone')->nullable()->default(null);
            $table->string('inc_email')->nullable()->default(null);


       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('client_details', function (Blueprint $table) {
            $table->dropColumn('inc_sname');
            $table->dropColumn('inc_phone');
            $table->dropColumn('inc_email');            

       });
    }
}
