<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('scholarship_experiences', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('gname')->nullable();
        //     $table->string('gcnic')->nullable();
        //     $table->string('galive')->nullable();
        //     $table->string('gpassion')->nullable();
        //     $table->string('gstatus')->nullable();
        //     $table->string('gcompany')->nullable();
        //     $table->string('gdesic')->nullable();
        //     $table->string('gcell')->nullable();
        //     $table->string('gphone')->nullable();
        //     $table->string('gincome')->nullable();
        //     $table->string('mother_alive')->nullable();
        //     $table->string('mother_working')->nullable();
        //     $table->string('scholarship_applicant_id')->nullable();
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
        Schema::dropIfExists('scholarship_experiences');
    }
}
