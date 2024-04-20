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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('presentation_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('evaluator_id');
            $table->integer('score');
            $table->text('comments');
            $table->timestamps();

            $table->foreign('presentation_id')->references('id')->on('presentations');
            $table->foreign('student_id')->references('id')->on('users');
            $table->foreign('evaluator_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
