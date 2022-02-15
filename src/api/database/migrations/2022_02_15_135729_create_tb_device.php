<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDevice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_device', function (Blueprint $table) {

            $table->id('pk_device');
            $table->unsignedBigInteger('fk_salle_dev')->default(0); // clé etrangère
            $table->string('identifiant_dev', 6); // identifiant du device de max 6 caractères
            $table->string('nom_dev', 50); // nom du device de max 50 caractères
            $table->timestamps(); // Ajoute le champs mouchards created_at et updated_at

            $table->foreign('fk_salle_dev')->references('pk_salle')->on('tb_salle');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_device');
    }
}
