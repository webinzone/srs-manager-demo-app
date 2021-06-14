<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientPowerofatonyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_powerofatony', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_id');
            $table->string('po_maker');
            $table->string('po_maker_address');
            $table->string('po_granter');
            $table->string('po_granter_address');
            $table->string('grant_reason');
            $table->string('g_date');
            $table->string('place');
            $table->string('termination_date');

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
        Schema::dropIfExists('client_powerofatony');
    }
}
