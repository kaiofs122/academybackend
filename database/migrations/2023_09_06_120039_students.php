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
            $table->String('name');
            $table->String('cpf');
            $table->String('email');
            $table->String('telephone');
            $table->String('date_birth');
            $table->String('presence');
            $table->String('lack');
            $table->String('weight');
            $table->String('height');
            $table->String('level');
            $table->String('goal');
            $table->unsignedBigInteger('id_instructor');
            $table->foreign('id_instructor')->references('id')->on('instructors');
            $table->String('Frequency');
            $table->String('url_picture');
            $table->String('road');
            $table->String('neighborhood');
            $table->String('city');
            $table->String('zip_code');
            $table->String('state');
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
