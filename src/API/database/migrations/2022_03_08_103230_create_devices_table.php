<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_devices', function (Blueprint $table) {
            $table->bigIncrements('pk_device')->unique();
            //$table->foreignId('id')->constrained('tb_salles');
            $table->unsignedBigInteger('fk_salle_dev'); // clé etrangère
            $table->string('identifiant_dev', 6); // identifiant du device de max 6 caractères
            $table->string('nom_dev', 50); // nom du device de max 50 caractères
            $table->timestamps(); // Ajoute le champs mouchards created_at et updated_at

            $table->foreign('fk_salle_dev')->references('pk_salle')->on('tb_salles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
