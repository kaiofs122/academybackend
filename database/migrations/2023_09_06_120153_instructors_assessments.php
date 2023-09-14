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
        Schema::create('instructors_assessments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_instructor');
            $table->foreign('id_instructor')->references('id')->on('instructors');
            $table->unsignedBigInteger('id_student');
            $table->foreign('id_student')->references('id')->on('students');
            $table->String('amount_stars_didatic');
            $table->String('amount_stars_patience');
            $table->String('amount_stars_charisma');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors_assessments');
    }
};
