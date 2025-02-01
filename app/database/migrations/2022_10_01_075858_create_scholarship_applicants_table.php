<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_applicants', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('fname')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('cnic')->nullable();
            $table->string('cell_no')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('tehsil_id')->nullable();
            $table->string('village')->nullable();
            $table->string('picture')->nullable();
            $table->string('working')->nullable();
            $table->string('desig')->nullable();
            $table->string('employer')->nullable();
            $table->string('monthincome')->nullable();
            $table->string('ac_title')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('ac_no')->nullable();
            $table->string('fass')->nullable();
            $table->string('fresh_renewal')->nullable();
            $table->string('active')->default('1');

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
        Schema::dropIfExists('scholarship_applicants');
    }
}
