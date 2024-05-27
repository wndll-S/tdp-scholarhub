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
        Schema::create('applications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('student_id')->unique();
            $table->integer('ranking_pts')->default(0);
            $table->enum('status', ['Pending', 'Approved', 'Rejected', 'Initial Screening', 'Secondary Screening'])
                    ->default('Pending');
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
        Schema::dropIfExists('applications');
    }
};
