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
            'fk_salle_dev' => $this->faker->numberBetween(1,50),
            'identifiant_dev' => $this->faker->text(6), // Phrase avec texte aléatoire
            'nom_dev' => $this->faker->text(50), // Paragraphe de textes aléatoires
        ];
    }
}
