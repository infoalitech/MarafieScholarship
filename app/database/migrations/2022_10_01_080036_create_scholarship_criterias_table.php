<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('scholarship_criterias', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('description')->nullable();
        //     $table->string('ssc')->nullable();
        //     $table->string('hssc')->nullable();
        //     $table->string('bachelor')->nullable();
        //     $table->string('master')->nullable();
        //     $table->string('mphil')->nullable();
        //     $table->string('phd')->nullable();
        //     $table->string('experience')->nullable();
        //     $table->string('max_exp')->nullable();
        //     $table->string('distinction')->nullable();
        //     $table->string('max_dist')->nullable();
        //     $table->string('publication')->nullable();
        //     $table->string('max_publication')->nullable();
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
        Schema::dropIfExists('scholarship_criterias');
    }
}
