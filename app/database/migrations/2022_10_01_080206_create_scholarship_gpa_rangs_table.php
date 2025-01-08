<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipGpaRangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('scholarship_gpa_rangs', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('gpa1')->nullable();
        //     $table->string('gpa2')->nullable();
        //     $table->string('per1')->nullable();
        //     $table->string('per2')->nullable();
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
        Schema::dropIfExists('scholarship_gpa_rangs');
    }
}
