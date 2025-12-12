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
            $table->enum('grade', ['X', 'XI', 'XII']);
            $table->string('photo_profile')->nullable();
            $table->string('name');
            $table->string('nis');
            $table->string('rombel');
            $table->string('password');
            $table->string('cv')->nullable();
            $table->string('kartu_pelajar')->nullable();
            $table->string('ig')->nullable();
            $table->string('linkedin')->nullable();

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
