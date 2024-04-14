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
            $table->string('regno')->default('NA');
            $table->string('name')->default('NA');
            $table->string('rank')->default('NA');
            $table->string('total_marks')->default('NA');
            $table->string('exam_name')->default('NA');
            $table->string('exam_month_year')->default('NA');
            $table->string('since')->default('NA');
            $table->string('state')->default('NA');
            $table->string('placement')->default('NA');
            $table->string('category')->default('NA');
            $table->string('mode')->default('NA');
            $table->string('franchise')->nullable();
            $table->string('profile')->default('NA');
            $table->decimal('rating', 2, 1)->default('0.0');
            $table->string('review')->default('NA');
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
