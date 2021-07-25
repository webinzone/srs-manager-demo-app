<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableRent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('rent_details', function (Blueprint $table) {
            
            $table->string('client_id')->nullable()->default(null);
            $table->string('company_id')->nullable()->default(null);
            $table->string('location_id')->nullable()->default(null);
            $table->string('type_pay')->nullable()->default(null);
            $table->string('respite')->nullable()->default(null);
            $table->string('duration')->nullable()->default(null);


       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('rent_details', function (Blueprint $table) {
            
            $table->dropColumn('client_id');
            $table->dropColumn('company_id');
            $table->dropColumn('location_id');
            $table->dropColumn('type_pay');
            $table->dropColumn('respite');
            $table->dropColumn('duration');


       });
    }
}
