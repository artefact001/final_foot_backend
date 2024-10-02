<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiragesTable extends Migration
{
    public function up()
{
    Schema::create('tirages', function (Blueprint $table) {
        $table->id();
        $table->string('phase'); // Phase du tirage (ex: Phase de groupes)
        $table->foreignId('competition_id')->constrained()->onDelete('cascade'); // Lien avec la compétition
        $table->json('poules')->nullable(); // Les poules en format JSON
        $table->unsignedInteger('nombre_poules'); // Nombre de poules
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('tirages');
    }
}
