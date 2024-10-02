<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipesTable extends Migration
{
    /**
     * Exécuter la migration pour créer la table 'equipes'.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipes', function (Blueprint $table) {
            $table->id();  // Identifiant unique pour chaque équipe
            $table->string('nom');  // Nom de l'équipe
            $table->string('ville');  // Ville de l'équipe
            $table->string('stade')->nullable();  // Stade de l'équipe, optionnel
            $table->timestamps();  // Champs pour enregistrer les dates de création et de mise à jour
        });
    }

    /**
     * Inverser la migration (suppression de la table 'equipes').
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipes');
    }
}
