<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableRoas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staff_roasters', function (Blueprint $table) {
            
            
            $table->string('time')->nullable()->default(null);
            $table->string('task')->nullable()->default(null);
            $table->string('pr_time')->nullable()->default(null);
            $table->string('init')->nullable()->default(null);
            $table->string('con_1')->nullable()->default(null);
            $table->string('con_2')->nullable()->default(null);
            $table->string('con_3')->nullable()->default(null);





       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staff_roasters', function (Blueprint $table) {
            
            
            $table->dropColumn('time');
            $table->dropColumn('task');
            $table->dropColumn('pr_time');
            $table->dropColumn('init');
            $table->dropColumn('con_1');
            $table->dropColumn('con_2');
            $table->dropColumn('con_3');

       });
    }
}
