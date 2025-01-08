<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipDistinctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('scholarship_distinctions', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('title')->nullable();
        //     $table->string('description')->nullable();
        //     $table->string('scholarship_applicant_id')->nullable();
        //     $table->string('countable')->nullable();
        //     $table->string('active')->default('1');
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
        Schema::dropIfExists('scholarship_distinctions');
    }
}
