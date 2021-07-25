<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEmps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('srs_staffs', function (Blueprint $table) {
            
            $table->string('emp_certi')->nullable()->default(null);
            $table->string('certi_exp')->nullable()->default(null);

            

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
            
            $table->dropColumn('emp_certi');
            $table->dropColumn('certi_exp');

            

       });
    }
}
