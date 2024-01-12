<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Supprimer la contrainte étrangère
            $table->dropForeign(['id_trainings']);

            // Supprimer la colonne si elle existe
            $table->dropColumn('id_trainings');
        });
    }

    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Ajouter la colonne et la contrainte étrangère si nécessaire
            $table->foreignId('id_trainings')->constrained('trainings')->onDelete('cascade');
        });
    }
};
