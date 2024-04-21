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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('presentation_id');
            $table->string('file_url');
            $table->unsignedBigInteger('group_id')->nullable();
            $table->unsignedBigInteger('uploaded_by')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('presentation_id')->references('id')->on('presentations');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('uploaded_by')->references('regno')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
