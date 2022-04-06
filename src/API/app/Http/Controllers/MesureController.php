<?php

namespace App\Http\Controllers;


use App\Models\Mesure;
use Illuminate\Http\Request;

class MesureController extends Controller
{
    /**
     * Affiche toutes les mesures par date et heure
     *
     * @response 200
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showAllMeasure()
    {
        return Mesure::orderBy('date_mes', 'ASC')->get();
    }

    /**
     * Affiche une tache selon son id
     *
     * @response 200
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showOneMeasure($idMesure)
    {
        return Mesure::findOrFail($idMesure);
    }

    public function showOneMeasureByDevice($idDevice, $idMesure)
    {
        return Mesure::where('fk_devices_mes', $idDevice)->where('pk_mesure',$idMesure);
    }

    /**
     * Valide la saisie des données dans la requête
     * Ajoute les mesures
     *
     * @response 201
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {

        $request['date_mes'] = date('Y-m-d H:i:s');
        return Mesure::create($request->all());
    }

    /**
     * Valide la saisie des données dans la requête
     * Met à jour les mesures
     *
     * @response 200
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function update($idMesure, Request $request)
    {
        $this->validate($request, Mesure::validateRules());
        Mesure::findOrFail($idMesure)->update($request->all());
        return Mesure::findOrFail($idMesure);
    }

    /**
     * Supprime une tache
     *
     * @response 204
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($idMesure)
    {
        Mesure::findOrFail($idMesure)->delete();
        return response('', 204);
    }
}

