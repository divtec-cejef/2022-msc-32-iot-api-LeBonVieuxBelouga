<?php

namespace App\Http\Controllers;


use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Affiche toutes les mesures par date et heure
     *
     * @response 200
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showAllDevice()
    {
        return Device::orderBy('identifiant_dev', 'ASC')->get();;
    }

    /**
     * Affiche une tache selon son id
     *
     * @response 200
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showOneDevice($idDevice)
    {
        return Device::findOrFail($idDevice);
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
        $this->validate($request, Device::validateRules());
        return Device::create($request->all());
    }

    /**
     * Valide la saisie des données dans la requête
     * Met à jour les mesures
     *
     * @response 200
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function update($idDevice, Request $request)
    {
        $this->validate($request, Device::validateRules());
        Device::findOrFail($idDevice)->update($request->all());
        return Device::findOrFail($idDevice);
    }

    /**
     * Supprime une tache
     *
     * @response 204
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($idDevice)
    {
        Device::findOrFail($idDevice)->delete();
        return response('', 204);
    }
}

