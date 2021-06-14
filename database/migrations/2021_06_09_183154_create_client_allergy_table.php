<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientAllergyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_allergy', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_id');
            $table->string('tof_allergy');
            $table->string('hos_name');
            $table->string('doc_name');
            $table->string('duration');
            $table->string('madicine');
            $table->string('tests_report');

            $table->integer('user_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_allergy');
    }
}
