<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableClientdetailss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_details', function (Blueprint $table) {
            $table->string('week_rent')->nullable()->default(null);
            $table->string('room_type')->nullable()->default(null);

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
            $table->dropColumn('week_rent');
            $table->dropColumn('room_type');

       });
    }
}
