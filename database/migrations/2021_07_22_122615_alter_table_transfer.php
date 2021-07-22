<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableTransfer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transfer_records', function (Blueprint $table) {
            $table->string('notif')->nullable()->default(null);
            $table->string('nok_contact')->nullable()->default(null);
            $table->string('gua_contact')->nullable()->default(null);
            $table->string('resadmin_contact')->nullable()->default(null);
            $table->string('nomini_contact')->nullable()->default(null);
            $table->string('doc_name')->nullable()->default(null);
            $table->string('doc_ph')->nullable()->default(null);
            $table->string('doc_fax')->nullable()->default(null);
            $table->string('doc_other')->nullable()->default(null);
            $table->string('allergy')->nullable()->default(null);
            $table->string('exis_medi')->nullable()->default(null);
            $table->string('sum_req')->nullable()->default(null);
            $table->string('other_relevent')->nullable()->default(null);
            $table->string('staff_incharge')->nullable()->default(null);


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
