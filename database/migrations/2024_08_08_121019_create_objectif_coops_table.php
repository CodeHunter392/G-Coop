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
        Schema::create('objectif_coops', function (Blueprint $table) {
            $table->id();
            $table->date('date_releve');
            $table->string('execution');
            $table->unsignedBigInteger('coop_id');
            $table->foreign('coop_id')->references('id')->on('cooperatives');
            $table->unsignedBigInteger('objectif_ligne_prg')->nullable();
            $table->foreign('objectif_ligne_prg')->references('id')->on('objectif_ligne_programmes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objectif_coops');
    }
};
