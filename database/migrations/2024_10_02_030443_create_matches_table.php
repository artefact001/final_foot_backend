<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Exécuter la migration pour créer la table 'matchs'.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();  // Identifiant unique pour chaque match
            $table->unsignedBigInteger('competition_id');  // Clé étrangère vers la compétition
            $table->string('equipe_local');  // Équipe locale
            $table->string('equipe_visiteur');  // Équipe visiteuse
            $table->integer('score_local')->nullable();  // Score de l'équipe locale
            $table->integer('score_visiteur')->nullable();  // Score de l'équipe visiteuse
            $table->dateTime('date_matche');  // Date et heure du match
            $table->timestamps();  // Champs pour enregistrer les dates de création et de mise à jour

            // Clé étrangère vers la table des compétitions
            $table->foreign('competition_id')->references('id')->on('competitions')->onDelete('cascade');
        });
    }

    /**
     * Inverser la migration (suppression de la table 'matchs').
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
