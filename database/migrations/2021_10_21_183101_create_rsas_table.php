<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rsas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('rsa_id')->nullable();
            $table->string('re_name')->nullable()->default(null);
            $table->string('re_wt')->nullable()->default(null);
            $table->string('re_date')->nullable()->default(null);
            $table->string('week_pay')->nullable()->default(null);
            $table->string('sty_perd')->nullable()->default(null);
            $table->string('nomini')->nullable()->default(null);
            $table->string('st_dt')->nullable()->default(null);
            $table->string('ed_dt')->nullable()->default(null);            
            $table->string('not_acc')->nullable()->default(null);
            $table->string('condi')->nullable()->default(null);
            $table->string('bednoo')->nullable()->default(null);
            $table->string('room_cl')->nullable()->default(null);
            $table->string('room_det')->nullable()->default(null);
            $table->string('tr_assi')->nullable()->default(null);
            $table->string('tr_det')->nullable()->default(null);
            $table->string('eating')->nullable()->default(null);
            $table->string('eat_det')->nullable()->default(null);
            $table->string('laundry')->nullable()->default(null);
            $table->string('laundry_det')->nullable()->default(null);
            $table->string('other')->nullable()->default(null);
            $table->string('other_det')->nullable()->default(null);

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
        Schema::dropIfExists('rsas');
    }
}
