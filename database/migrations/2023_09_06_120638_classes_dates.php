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
        Schema::create('classes_dates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_class');
            $table->foreign('id_class')->references('id')->on('classes');
            $table->String('date');
            $table->String('start_time');
            $table->String('duration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes_dates');
    }
};
