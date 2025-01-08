<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('scholarship_qualifications', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('degree_id')->nullable();
        //     $table->string('scholarship_applicant_id')->nullable();
        //     $table->string('institute')->nullable();
        //     $table->string('year')->nullable();
        //     $table->string('obt_marks')->nullable();
        //     $table->string('total_marks')->nullable();
        //     $table->string('obt_gpa')->nullable();
        //     $table->string('percentage')->nullable();
        //     $table->string('division')->nullable();
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
        Schema::dropIfExists('scholarship_qualifications');
    }
}
