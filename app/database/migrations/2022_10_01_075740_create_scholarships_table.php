<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('scholarships', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('post')->nullable();
        //     $table->string('date_of_advertisement')->nullable();
        //     $table->string('last_date')->nullable();
        //     $table->string('description')->nullable();
        //     $table->string('condition')->nullable();
        //     $table->string('criteria_id')->nullable();
        //     $table->string('approval_id')->nullable();
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
        Schema::dropIfExists('scholarships');
    }
}
