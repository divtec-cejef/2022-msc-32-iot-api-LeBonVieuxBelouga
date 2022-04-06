<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

class Device extends Model
{

    use HasFactory;

    //affiche ce message lors d'une erreur 404
    public $modelNotFoundMessage = "Device inexistante";

    /**
     * La table associée au modèle.
     *
     * @var string
     */
    protected $table = 'tb_devices';

    /**
     * La clé primaire associée à la table.
     *
     * @var string
     */
    protected $primaryKey = 'pk_device';

    /**
     * Validation des données
     * @return array[] qui contient
     */
    static function validateRules()
    {
        return [
            'fk_salle_dev' => 'int',
            'identifiant_dev' => 'int',
            'nom_dev' => 'string'
        ];
    }

    /**
     * Liste des attributs modifiables
     *
     * @var array
     */
    protected $fillable = [
        'fk_salle_dev',
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
