<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultatsTable extends Migration
{
    public function up()
    {
        Schema::create('resultats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matche_id')->constrained('matches')->onDelete('cascade');
            $table->foreignId('equipe_id')->constrained('equipes')->onDelete('cascade');
            $table->integer('score');
            $table->boolean('is_winner')->default(false);

        //    details
            $table->json('buteurs')->nullable(); // Liste des IDs des joueurs buteurs
            $table->json('passeurs')->nullable(); // Liste des IDs des joueurs passeurs
            $table->foreignId('homme_du_match')->nullable()->constrained('joueurs')->onDelete('set null'); // Joueur homme du match

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resultats');
    }
}
