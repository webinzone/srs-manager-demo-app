<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSupportp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('support_plans', function (Blueprint $table) {
            $table->string('r_with')->nullable()->default(null);
            $table->string('r_notes')->nullable()->default(null);
            


       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('support_plans', function (Blueprint $table) {
            $table->dropColumn('r_with');
            $table->dropColumn('r_notes');
            


       });
    }
}
