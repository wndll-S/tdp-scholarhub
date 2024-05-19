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
        Schema::create('guardian_parents', function (Blueprint $table) {
            $table->id();
            $table->uuid('family_background_id');
            $table->string('first_name',50);
            $table->string('middle_name',50);
            $table->string('last_name',50);
            $table->string('address');
            $table->float('contact_number', 10);
            $table->string('occupation',50);
            $table->string('employer_name',100);
            $table->string('employer_address', 100);
            $table->integer('annual_gross_income');
            $table->enum('status', ['Living', 'Deceased'])
                    ->default('Living');
            $table->enum('relationship', ['Father', 'Mother', 'Legal Guardian']);
            $table->timestamps();

            $table->foreign('family_background_id')
                ->references('id')
                ->on('family_backgrounds')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardian_parents');
    }
};
