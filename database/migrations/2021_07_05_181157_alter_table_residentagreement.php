<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableResidentagreement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resident_agreements', function (Blueprint $table) {
            $table->string('bath')->nullable()->default(null);
            $table->string('bath_fee')->nullable()->default(null);
            $table->string('oral')->nullable()->default(null);
            $table->string('oral_fee')->nullable()->default(null);
            $table->string('hair')->nullable()->default(null);
            $table->string('hair_fee')->nullable()->default(null);
            $table->string('toileting')->nullable()->default(null);
            $table->string('toileting_fee')->nullable()->default(null);
            $table->string('mobility')->nullable()->default(null);
            $table->string('mobility_fee')->nullable()->default(null);
            $table->string('medi_assi')->nullable()->default(null);
            $table->string('medi_assi_fee')->nullable()->default(null);
            $table->string('continence')->nullable()->default(null);
            $table->string('continence_fee')->nullable()->default(null);
            $table->string('bed_make')->nullable()->default(null);
            $table->string('bed_make_fee')->nullable()->default(null);
            $table->string('dressing')->nullable()->default(null);
            $table->string('dressing_fee')->nullable()->default(null);
            

           

       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resident_agreements', function (Blueprint $table) {
            $table->dropColumn('bath');
            $table->dropColumn('bath_fee');
            $table->dropColumn('oral');
            $table->dropColumn('oral_fee');
            $table->dropColumn('hair');
            $table->dropColumn('hair_fee');
            $table->dropColumn('toileting');
            $table->dropColumn('toileting_fee');
            $table->dropColumn('mobility');
            $table->dropColumn('mobility_fee');
            $table->dropColumn('medi_assi');
            $table->dropColumn('medi_assi_fee');
            $table->dropColumn('continence');
            $table->dropColumn('continence_fee');
            $table->dropColumn('bed_make');
            $table->dropColumn('bed_make_fee');
            $table->dropColumn('dressing');
            $table->dropColumn('dressing_fee');
           


       });
    }
}
