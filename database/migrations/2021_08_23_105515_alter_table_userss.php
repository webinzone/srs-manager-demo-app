<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUserss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('users', function (Blueprint $table) {
            $table->string('companyid')->nullable()->default(null);
            $table->string('locationid')->nullable()->default(null);
            $table->string('s_role')->nullable()->default(null);
            $table->string('companyname')->nullable()->default(null);
            $table->string('locationname')->nullable()->default(null);          


       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
