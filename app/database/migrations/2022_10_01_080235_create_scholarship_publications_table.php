<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipPublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_publications', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('journal')->nullable();
            $table->string('impact_factor')->nullable();
            $table->string('scholarship_applicant_id')->nullable();
            $table->string('countable')->nullable();
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
        Schema::dropIfExists('scholarship_publications');
    }
}
