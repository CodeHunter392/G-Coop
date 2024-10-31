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
        Schema::create('objectif_ligne_programmes', function (Blueprint $table) {
            $table->id();
            $table->date('echeance');
            $table->unsignedBigInteger('objectif_id')->nullable();
            $table->foreign('objectif_id')->references('id')->on('objectifs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objectif_ligne_programmes');
    }
};
