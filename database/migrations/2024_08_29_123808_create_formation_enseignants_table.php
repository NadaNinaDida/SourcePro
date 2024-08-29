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
        Schema::create('formation_enseignants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_enseignant')->constrained('enseignants')->onDelete('cascade');
            $table->foreignId('id_cours')->constrained('formations')->onDelete('cascade');
            $table->decimal('prix_heure', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formation_enseignants');
    }
};
