<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableClientdeta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('client_details', function (Blueprint $table) {
            $table->string('allergy_det')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
            $table->string('company_id')->nullable()->default(null);
            $table->string('location_id')->nullable()->default(null);


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
            $table->dropColumn('allergy_det');
            $table->dropColumn('status');
            $table->dropColumn('company_id');
            $table->dropColumn('location_id');


       });
    }
}
