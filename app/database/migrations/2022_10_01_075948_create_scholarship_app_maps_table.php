<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipAppMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('scholarship_app_maps', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('scholarship_applicant_id')->nullable();
        //     $table->string('scholarship_id')->nullable();
        //     $table->string('apply_date')->nullable();
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
        Schema::dropIfExists('scholarship_app_maps');
    }
}
