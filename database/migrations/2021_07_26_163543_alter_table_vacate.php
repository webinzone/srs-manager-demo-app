<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableVacate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('vaccates', function (Blueprint $table) {
            
            $table->string('pay_status')->nullable()->default(null);
            $table->string('pay_amt')->nullable()->default(null);

            

       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('vaccates', function (Blueprint $table) {
            
            $table->dropColumn('pay_status');
            $table->dropColumn('pay_amt');

            

       });
    }
}
