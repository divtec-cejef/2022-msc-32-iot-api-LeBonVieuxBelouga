<?php

namespace Database\Factories;

use App\Models\Mesure;

use Illuminate\Database\Eloquent\Factories\Factory;

class MesureFactory extends Factory
{
    /**
     * Le nom du modèle correspondant.
     *
     * @var string
     */
    protected $model = Mesure::class;

    /**
     * Définir l'état par défaut du modèle.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fk_device_mes' => $this->faker->numberBetween(1, 50),
            'humidite_mes' => $this->faker->numberBetween(1, 100), // Nombre aléatoire entre 1 et 100,
            'temperature_mes' => $this->faker->numberBetween(1, 100), // Nombre aléatoire entre 1 et 100,
            'date_mes' => $this->faker->date('Y-m-d H:i:s'), // Date aléatoire au format MySQL
        ];
    }
}
