<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipQualEquisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('scholarship_qual_equis', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('scholarship_qualification_id')->nullable();
        //     $table->string('equivalent_to')->nullable();
        //     $table->string('scholarship_applicant_id')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scholarship_qual_equis');
    }
}
