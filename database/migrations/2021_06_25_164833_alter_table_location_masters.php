<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableLocationMasters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('location_masters', function (Blueprint $table) {
            $table->string('suburb')->nullable()->default(null);
            $table->string('post_code')->nullable()->default(null);
            $table->string('state')->nullable()->default(null);
            $table->string('company_id')->nullable()->default(null);

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('location_masters', function (Blueprint $table) {
            $table->dropColumn('suburb');
            $table->dropColumn('post_code');
            $table->dropColumn('state');
            $table->dropColumn('company_id');

    });
    }
}
