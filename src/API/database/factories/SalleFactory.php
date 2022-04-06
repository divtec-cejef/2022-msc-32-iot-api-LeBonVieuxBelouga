<?php

namespace Database\Factories;

use App\Models\Salle;

use Illuminate\Database\Eloquent\Factories\Factory;

class SalleFactory extends Factory
{
    /**
     * Le nom du modèle correspondant.
     *
     * @var string
     */
    protected $model = Salle::class;

    /**
     * Définir l'état par défaut du modèle.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numero_sal' => $this->faker->text(6), // Paragraphe de textes aléatoires
        ];
    }
}
