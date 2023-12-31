<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('general_assessments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_instructor_assessment');
            $table->foreign('id_instructor_assessment')->references('id')->on('instructors_assessments');
            $table->string('assessment_count');
            $table->string('average_stars');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_assessments');
    }
};
