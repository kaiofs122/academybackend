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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->String('student_name');
            $table->String('student_cpf');
            $table->String('student_email');
            $table->String('student_telephone');
            $table->String('student_date_birth');
            $table->String('student_weight');
            $table->String('student_height');
            $table->String('student_level');
            $table->String('student_goal');
            $table->unsignedBigInteger('id_instructor');
            $table->foreign('id_instructor')->references('id')->on('instructors');
            $table->String('student_frequency');
            $table->String('student_photo_url');
            $table->String('student_address');
            $table->String('student_address_number');
            $table->String('student_city');
            $table->String('student_zip_code');
            $table->String('student_state');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
