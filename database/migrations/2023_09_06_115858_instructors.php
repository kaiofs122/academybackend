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
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('instructor_name');
            $table->string('instructor_cpf');
            $table->string('instructor_telephone');
            $table->string('instructor_email');
            $table->string('instructor_date_birth');
            $table->string('instructor_time_arrival');
            $table->string('instructor_time_exit');
            $table->string('instructor_address');
            $table->string('instructor_address_number');
            $table->string('instructor_city');
            $table->string('instructor_zip_code');
            $table->string('instructor_state');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors');
    }
};
