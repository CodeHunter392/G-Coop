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
        Schema::create('ligne_coops', function (Blueprint $table) {
            $table->id();
            $table->decimal('sub_demander');
            $table->decimal('sub_accorder');
            $table->date('date_accord');
            $table->unsignedBigInteger('coop_id')->nullable();
            $table->unsignedBigInteger('ligne_prg_id')->nullable();
            $table->foreign('coop_id')->references('id')->on('cooperatives');
            $table->foreign('ligne_prg_id')->references('id')->on('ligne_programmes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_coops');
    }
};
