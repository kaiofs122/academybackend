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
        Schema::create('anamnesis_student_symtoms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anamnesis_id');
            $table->foreign('anamnesis_id')->references('id')->on('anamnesis');
            $table->unsignedBigInteger('symtom_id');
            $table->foreign('symtom_id')->references('id')->on('symtoms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anamnesis_student_symtoms');
    }
};
