<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEmpq extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('srs_staffs', function (Blueprint $table) {
            
            $table->string('qop_date')->nullable()->default(null);
            $table->string('item_no')->nullable()->default(null);

            

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
            
            $table->dropColumn('qop_date');
            $table->dropColumn('item_no');

            

       });
    }
}
