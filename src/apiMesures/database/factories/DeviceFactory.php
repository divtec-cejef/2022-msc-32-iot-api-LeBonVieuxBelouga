<?php

namespace Database\Factories;

use App\Models\Device;

use Illuminate\Database\Eloquent\Factories\Factory;

class DeviceFactory  extends Factory
{

    /**
     * Le nom du modèle correspondant.
     *
     * @var string
     */
    protected $model = Device::class;

    /**
     * Définir l'état par défaut du modèle.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'identifiant_dev' => $this->faker->sentence, // Phrase avec texte aléatoire
            'nom_dev' => $this->faker->paragraph, // Paragraphe de textes aléatoires
        ];
    }
}
