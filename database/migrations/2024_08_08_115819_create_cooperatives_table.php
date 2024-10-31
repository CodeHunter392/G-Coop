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
        Schema::create('cooperatives', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->unsignedBigInteger('secteur_id');
            $table->integer('nb_adherant');
            $table->date('date_creation');
            $table->date('date_fin_activite');
            $table->string('adresse');
            $table->boolean('statut')->default(0);
            $table->unsignedBigInteger('type_coop');
            $table->unsignedBigInteger('localite_id');
            $table->foreign('secteur_id')->references('id')->on('secteurs');
            $table->foreign('localite_id')->references('id')->on('localites');
            $table->foreign('type_coop')->references('id')->on('type_coops');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cooperatives');
    }
};
