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
        Schema::create('localites', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->unsignedBigInteger('id_parent')->nullable();
            $table->unsignedBigInteger('niveau_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localites');
    }
};
