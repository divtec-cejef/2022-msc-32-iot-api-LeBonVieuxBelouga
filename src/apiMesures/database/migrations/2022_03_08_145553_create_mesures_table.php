<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_mesures', function (Blueprint $table) {
            $table->bigIncrements('pk_mesure');
            //$table->foreignId('fk_device_mes')->constrained('tb_devices');
            $table->unsignedBigInteger('fk_device_mes'); // clé etrangère
            $table->string('humidite_mes', 3); // humidité de max 3 caractères
            $table->string('temperature_mes', 3); // température de max 3 caractères
            $table->date('date_mes')->useCurrent(); //  date actuelle
            $table->dateTime('heure_mes')->useCurrent(); // Date de fin, par défaut heure et date actuelle
            $table->timestamps(); // Ajoute le champs mouchards created_at et updated_at

            $table->foreign('fk_device_mes')->references('pk_device')->on('tb_devices');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mesures');
    }
}
