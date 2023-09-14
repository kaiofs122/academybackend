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
        Schema::create('notifications_instructors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_instructor');
            $table->foreign('id_instructor')->references('id')->on('instructors');
            $table->string('text_notification');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications_instructors');
    }
};
