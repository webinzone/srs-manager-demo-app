<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePgrnotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('progress_notes', function (Blueprint $table) {
            $table->string('p_date')->nullable()->default(null);
            $table->string('dob')->nullable()->default(null);
            $table->string('gender')->nullable()->default(null);
            $table->string('room')->nullable()->default(null);
            $table->string('g_name')->nullable()->default(null);


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
            $table->dropColumn('p_date');
            $table->dropColumn('dob');
            $table->dropColumn('gender');
            $table->dropColumn('room');
            $table->dropColumn('g_name');


       });
    }
}
