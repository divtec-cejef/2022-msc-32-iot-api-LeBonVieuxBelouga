<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{

    use HasFactory;

    //affiche ce message lors d'une erreur 404
    public $modelNotFoundMessage = "Salle inexistante";

    /**
     * La table associée au modèle.
     *
     * @var string
     */
    protected $table = 'tb_salles';

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
            'numero_sal' => 'required|string',
        ];
    }

    /**
     * Liste des attributs modifiables
     *
     * @var array
     */
    protected $fillable = [
        'numero_sal'
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
