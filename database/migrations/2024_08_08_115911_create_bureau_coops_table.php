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
        Schema::create('bureau_coops', function (Blueprint $table) {
            $table->id();
            $table->date('date_mandant');
            $table->date('date_fin');
            $table->boolean('en_cours')->default(1);
            $table->unsignedBigInteger('cooperative_id')->nullable();
            $table->foreign('cooperative_id')->references('id')->on('cooperatives')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bureau_coops');
    }
};
