<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionsTable extends Migration
{
    /**
     * Exécuter la migration pour créer la table 'competitions'.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();  // Identifiant unique pour chaque compétition
            $table->string('nom');  // Nom de la compétition
            $table->string('lieu');  // Lieu de la compétition
            $table->date('date_debut');  // Date de début de la compétition
            $table->date('date_fin');  // Date de fin de la compétition
            $table->timestamps();  // Champs pour enregistrer les dates de création et de mise à jour
        });
    }

    /**
     * Inverser la migration (suppression de la table 'competitions').
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competitions');
    }
}
