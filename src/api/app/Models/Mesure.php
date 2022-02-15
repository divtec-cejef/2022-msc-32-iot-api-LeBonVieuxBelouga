<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesure extends Model
{

    /**
     * La table associée au modèle.
     *
     * @var string
     */
    // protected $table = 'tb_mesure';

    /**
     * La clé primaire associée à la table.
     *
     * @var string
     */
    // protected $primaryKey = 'pk_mesure';

    /**
     * Validation des données
     * @return array[] qui contient
     */
    static function validateRules()
    {
        return [
            'pk_mesure' => 'required|numeric',
            'humidite_mes' => 'required|string',
            'temperature_mes' => 'required|string',
            'date_mes' => 'required|date',
            'heure_mes' => 'required|date'
        ];
    }

    /**
     * Liste des attributs modifiables
     *
     * @var array
     */
    protected $fillable = [
        'humidite_mes',
        'temperature_mes',
        'date_mes',
        'heure_mes'
    ];

    /**
     * Liste des attributs cachés
     * Seront exclus dans les réponses
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
