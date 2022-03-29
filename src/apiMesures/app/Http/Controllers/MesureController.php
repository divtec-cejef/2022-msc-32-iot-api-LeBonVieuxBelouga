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
    public function showAllMeasures()
    {
        return Mesure::table('mesures')
                ->orderBy('date_mes','', 'ASC')
                ->orderBy('heure_mes','', 'ASC')
                ->get();
    }

    /**
     * Affiche une tache selon son id
     *
     * @response 200
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showOneMeasures($id)
    {
        return Mesure::findOrFail($id);
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
        $this->validate($request, Mesure::validateRules());
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

    public function update($id, Request $request)
    {
        $this->validate($request, Mesure::validateRules());
        Mesure::findOrFail($id)->update($request->all());
        return Mesure::findOrFail($id);
    }

    /**
     * Supprime une tache
     *
     * @response 204
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        Mesure::findOrFail($id)->delete();
        return response('', 204);
    }
}

