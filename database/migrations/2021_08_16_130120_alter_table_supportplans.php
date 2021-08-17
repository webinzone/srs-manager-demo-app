<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSupportplans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('support_plans', function (Blueprint $table) {
            $table->string('cons')->nullable()->default(null);
            $table->string('adm_date')->nullable()->default(null);
            $table->string('gp_name')->nullable()->default(null);
            $table->string('gp_contact')->nullable()->default(null);
            $table->string('other_gp')->nullable()->default(null);
            $table->string('nomini')->nullable()->default(null);
            $table->string('s_date')->nullable()->default(null);
            $table->string('review')->nullable()->default(null);
            $table->string('mobility')->nullable()->default(null);
            $table->string('f1')->nullable()->default(null);
            $table->string('f2')->nullable()->default(null);
            $table->string('f3')->nullable()->default(null);
            $table->string('f4')->nullable()->default(null);
            $table->string('f5')->nullable()->default(null);
            $table->string('f6')->nullable()->default(null);
            $table->string('f7')->nullable()->default(null);


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
            $table->dropColumn('cons');
            $table->dropColumn('adm_date');
            $table->dropColumn('gp_name');
            $table->dropColumn('gp_contact');
            $table->dropColumn('other_gp');
            $table->dropColumn('nomini');
            $table->dropColumn('s_date');
            $table->dropColumn('review');
            $table->dropColumn('mobility');
            $table->dropColumn('f1');
            $table->dropColumn('f2');
            $table->dropColumn('f3');
            $table->dropColumn('f4');
            $table->dropColumn('f5');
            $table->dropColumn('f6');
            $table->dropColumn('f7');

       });
    }
}
