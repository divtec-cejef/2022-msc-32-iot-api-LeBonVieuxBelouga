<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

class Mesure extends Model
{

    //affiche ce message lors d'une erreur 404
    public $modelNotFoundMessage = "Mesure inexistante";

    /**
     * La table associée au modèle.
     *
     * @var string
     */
    // protected $table = 'tb_mesures';

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
            'temperature_mes' => 'required|numeric',
            'date_mes' => 'required|date',
            'heure_mes' => 'required|string'
        ];
    }

    /**
     * Liste des attributs modifiables
     *
     * @var array
     */
    protected $fillable = [
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
