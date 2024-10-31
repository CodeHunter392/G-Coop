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
        Schema::create('programme_organismes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('programme_id');
            $table->unsignedBigInteger('organisme_id')->nullable();
            $table->foreign('programme_id')->references('id')->on('programmes');
            $table->foreign('organisme_id')->references('id')->on('organismes');
            $table->decimal('montant_organisme');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programme_organismes');
    }
};
