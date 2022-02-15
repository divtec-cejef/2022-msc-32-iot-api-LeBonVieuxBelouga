<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{

    /**
     * La table associée au modèle.
     *
     * @var string
     */
    // protected $table = 'tb_salle';

    /**
     * La clé primaire associée à la table.
     *
     * @var string
     */
    // protected $primaryKey = 'pk_salle';

    /**
     * Validation des données
     * @return array[] qui contient
     */
    static function validateRules()
    {
        return [
            'pk_salle' => 'required|numeric',
            'numero_sal' => 'required|string'
        ];
    }

    /**
     * Liste des attributs modifiables
     *
     * @var array
     */
    protected $fillable = [
        'pk_salle',
        'numero_sal',
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
