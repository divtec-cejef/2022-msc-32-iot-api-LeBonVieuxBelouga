<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

class Mesure extends Model
{

    use HasFactory;

    //affiche ce message lors d'une erreur 404
    public $modelNotFoundMessage = "Mesure inexistante";

    /**
     * La table associée au modèle.
     *
     * @var string
     */
    protected $table = 'tb_mesures';

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
            'fk_device_mes' => 'required',
            'humidite_mes' => 'required',
            'temperature_mes' => 'required',
            'date_mes' => 'required|date',
        ];
    }

    /**
     * Liste des attributs modifiables
     *
     * @var array
     */
    protected $fillable = [
        'fk_device_mes',
        'humidite_mes',
        'temperature_mes',
        'date_mes',
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
