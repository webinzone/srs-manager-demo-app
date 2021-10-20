<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableComppp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->string('c_date')->nullable()->default(null);
            $table->string('p_comp')->nullable()->default(null);
            $table->string('p_nomini')->nullable()->default(null);
            $table->string('noti_date')->nullable()->default(null);
            $table->string('noti_time')->nullable()->default(null);


       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('complaints', function (Blueprint $table) {
            $table->dropColumn('c_date');
            $table->dropColumn('p_comp');
            $table->dropColumn('p_nomini');
            $table->dropColumn('noti_date');
            $table->dropColumn('noti_time');


       });
    }
}
