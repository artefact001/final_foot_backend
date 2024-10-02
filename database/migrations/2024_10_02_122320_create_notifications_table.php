<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('message');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('type')->default('general'); // 'resultat', 'calendrier', 'evenement'
            $table->boolean('status')->default(false);  // non lu par défaut
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
