<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_visitors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_id');
            $table->string('allowed_status');
            $table->string('name');
            $table->string('gender');
            $table->string('relation');
            $table->string('address');
            $table->string('ph');
            $table->string('id_no');
            $table->string('nationality');

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
        Schema::dropIfExists('client_visitors');
    }
}
