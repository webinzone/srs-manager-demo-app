<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableProgress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('progress_notes', function (Blueprint $table) {
            $table->string('res_name')->nullable()->default(null);
            $table->string('client_id')->nullable()->default(null);
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
       Schema::table('progress_notes', function (Blueprint $table) {
            $table->dropColumn('res_name');
            $table->dropColumn('client_id');
            $table->dropColumn('company_id');
            $table->dropColumn('location_id');


       });
    }
}
