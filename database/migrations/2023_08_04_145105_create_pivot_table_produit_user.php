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
        Schema::create('produit_user', function (Blueprint $table) {
            
            $table->id();
            $table->string('numero')->unique(); // numero de tracking
            $table->foreignId('user_id')->constrained(); //client(emetteur)
            $table->foreignId('produit_id')->constrained();
            $table->foreignId('transporteur_id')->constrained();
            $table->foreignId('modepaiement_id')->constrained();
            $table->string('nom_complet'); // du destinataire
            $table->string('adresse'); // du destinataire
            $table->string('telephone'); // du destinataire
            $table->string('email'); // du destinataire
            $table->string('mode')->default('terrestre'); // terrestre,aerien,maritime
            $table->integer('qte');
            $table->string('origine'); // pays d'origine
            $table->string('destination'); // pays destination
            $table->float('poids');
            $table->integer('fret_total')->nullable();
            $table->string('date_ramassage');
            $table->string('date_livraison');
            $table->string('heure_depart');
            $table->string('heure_prise_charge');
            $table->integer('paquets')->default(1);
            $table->text('commentaire')->nullable();
            $table->string('statut')->default('en attente');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_user');
    }
};
