<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableTransferrec extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('transfer_records', function (Blueprint $table) {
            $table->string('client_id')->nullable()->default(null);
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
             $table->dropColumn('client_id');
            $table->dropColumn('status');
            $table->dropColumn('company_id');
            $table->dropColumn('location_id');
    }
}
