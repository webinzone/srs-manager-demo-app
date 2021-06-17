<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAllergyStatusToClientAllergyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_allergy', function (Blueprint $table) {
           $table->string('allergy_status')->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_allergy', function (Blueprint $table) {
           $table->string('allergy_status')->nullable();
           
        });
    }
}
