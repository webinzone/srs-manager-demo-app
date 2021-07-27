<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEmpps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('srs_staffs', function (Blueprint $table) {
            
            $table->string('posi')->nullable()->default(null);
            $table->string('tfn')->nullable()->default(null);
            $table->string('abn')->nullable()->default(null);
            $table->string('s_comp')->nullable()->default(null);
            $table->string('s_no')->nullable()->default(null);
            $table->string('fi_date')->nullable()->default(null);
            $table->string('crime')->nullable()->default(null);
            $table->string('w_child')->nullable()->default(null);

            

       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('srs_staffs', function (Blueprint $table) {
            
            $table->dropColumn('posi');
            $table->dropColumn('tfn');
            $table->dropColumn('abn');
            $table->dropColumn('s_comp');
            $table->dropColumn('s_no');
            $table->dropColumn('fi_date');
            $table->dropColumn('crime');
            $table->dropColumn('w_child');

            

       });
    }
}
