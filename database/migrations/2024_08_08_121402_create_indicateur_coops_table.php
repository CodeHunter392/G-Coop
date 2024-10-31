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
        Schema::create('indicateur_coops', function (Blueprint $table) {
            $table->id();
            $table->date('date_releve');
            $table->float('valeur');
            $table->unsignedBigInteger('coop_id');
            $table->foreign('coop_id')->references('id')->on('cooperatives');
            $table->unsignedBigInteger('indic_sociaux')->nullable();
            $table->foreign('indic_sociaux')->references('id')->on('indicateur_sociauxes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indicateur_coops');
    }
};
