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
        Schema::create('training_exercises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_training');
            $table->foreign('id_training')->references('id')->on('trainings');
            $table->unsignedBigInteger('id_exercise');
            $table->foreign('id_exercise')->references('id')->on('exercises');
            $table->String('repetitions');
            $table->String('series');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_exercises');
    }
};
