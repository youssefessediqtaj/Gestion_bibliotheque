<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('emprunts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livre_id')->constrained()->onDelete('cascade');
            $table->foreignId('adherent_id')->constrained()->onDelete('cascade');
            $table->date('date_emprunt');
            $table->date('date_retour');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('emprunts');
    }
}; 