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
        Schema::create('notifications_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_student');
            $table->foreign('id_student')->references('id')->on('students');
            $table->String('text_notification');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications_students');
    }
};
