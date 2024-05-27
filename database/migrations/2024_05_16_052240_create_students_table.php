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
            $table->uuid('id')->primary();
            $table->string('first_name', 50);
            $table->string('middle_name', 50);
            $table->string('last_name', 50);
            $table->enum('name_ext',['Sr.', 'Jr.', 'III'])->nullable();
            $table->date('birthday')->nullable();
            $table->string('birth_place', 255)->nullable();
            $table->enum('sex', ['male', 'female'])
                    ->nullable();
            $table->string('citizenship')->nullable();
            $table->enum('civil_status', ['Single', 'Married', 'Annulled', 'Widowed', 'Separated', 'Others'])
                    ->default('Single');
            $table->string('ip_affiliation', 255)
                    ->nullable();
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
