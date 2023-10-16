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
        Schema::create('student_physical_activities', function (Blueprint $table) {
            $table->id();
            $table->string('physical_activity_name');
            $table->string('physical_activity_frequency');
            $table->string('physical_activity_duration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_physical_activities');
    }
};
