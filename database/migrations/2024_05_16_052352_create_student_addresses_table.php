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
        Schema::create('student_addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('student_id')->unique();
            $table->string('barangay', 50);
            $table->string('city_town', 50);
            $table->string('district',15);
            $table->integer('zip_code');
            $table->timestamps();

            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_addresses');
    }
};
