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
        Schema::create('membre_bureaus', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('poste');
            $table->string('tel');
            $table->unsignedBigInteger('bureau_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('bureau_id')->references('id')->on('bureau_coops')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membre_bureaus');
    }
};
