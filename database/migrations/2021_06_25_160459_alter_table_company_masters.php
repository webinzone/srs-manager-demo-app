<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableCompanyMasters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_masters', function (Blueprint $table) {
            $table->string('suburb')->nullable()->default(null);
            $table->string('post_code')->nullable()->default(null);
            $table->string('web')->nullable()->default(null);
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
        Schema::table('company_masters', function (Blueprint $table) {
            $table->dropColumn('suburb');
            $table->dropColumn('post_code');
            $table->dropColumn('web');
            $table->dropColumn('company_id');

    });
    }
}
