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
        Schema::create('anamnesis', function (Blueprint $table) {
            $table->id();
            $table->string('student_hours_worked_on_week');
            $table->string('student_relatives_with_enfermities');
            $table->string('student_surgeries');
            $table->string('student_enfermities');
            $table->string('student_alergies');
            $table->string('student_accident_or_lesson');
            $table->string('student_physical_activities_restricitions');
            $table->string('student_smoker');
            $table->string('anamnesis_coments');
            $table->unsignedBigInteger('id_student');
            $table->foreign('id_student')->references('id')->on('students');
            $table->unsignedBigInteger('id_instructor');
            $table->foreign('id_instructor')->references('id')->on('instructors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anamnesis');
    }
};
