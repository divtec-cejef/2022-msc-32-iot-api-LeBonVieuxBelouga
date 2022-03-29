<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

class Device extends Model
{

    //affiche ce message lors d'une erreur 404
    public $modelNotFoundMessage = "Device inexistante";

    /**
     * La table associée au modèle.
     *
     * @var string
     */
    // protected $table = 'tb_devices';

    /**
     * La clé primaire associée à la table.
     *
     * @var string
     */
    // protected $primaryKey = 'pk_device';

    /**
     * Validation des données
     * @return array[] qui contient
     */
    static function validateRules()
    {
        return [
            'identifiant_dev' => 'required|numeric',
            'nom_dev' => 'required|string'
        ];
    }

    /**
     * Liste des attributs modifiables
     *
     * @var array
     */
    protected $fillable = [
        'identifiant_dev',
        'nom_dev'
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
