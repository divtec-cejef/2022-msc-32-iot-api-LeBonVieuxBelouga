<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{

    /**
     * La table associée au modèle.
     *
     * @var string
     */
    // protected $table = 'tb_device';

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
            'pk_device' => 'required|numeric',
            'identifiant_dev' => 'required|string',
            'nom_dev' => 'required|string',
        ];
    }

    /**
     * Liste des attributs modifiables
     *
     * @var array
     */
    protected $fillable = [
        'pk_device',
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
