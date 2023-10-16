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
        Schema::create('anamnesis_physical_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anamnesis_id');
            $table->foreign('anamnesis_id')->references('id')->on('anamnesis');
            $table->unsignedBigInteger('physical_activity_id');
            $table->foreign('physical_activity_id')->references('id')->on('student_physical_activities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anamnesis_physical_activities');
    }
};
