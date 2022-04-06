<?php
/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Création du groupr api : http://localhost:8000/api/
$router->group(['prefix' => 'api'], function () use ($router) {

    // Renvoi tout les devices existant.
    $router->get('devices', ['uses' => 'DeviceController@showAllDevice']);

    // Renvoi les informations du device
    $router->get('devices/{idDevice}', ['uses' => 'DeviceController@showOneDevice']);

    //  Retourne un tableau de toutes les mesures enregistré par un device spécifié
    $router->get('devices/{idDevice}/mesures', ['uses' => 'MesureController@showAllMeasure']);

    // Retourne une mesure spécifié capté par un device.
    $router->get('devices/{idDevice}/mesures/{idMesure}', ['uses' => 'MesureController@showOneMeasureByDevice']);

    // Créé un tableau comportant les informations d'un nouveau device
    $router->post('devices', ['uses' => 'DeviceController@create']);

    // Créé un tableau des nouvelles valeurs enregistré par le device
    $router->post('devices/{idDevice}/mesures', ['uses' => 'MesureController@create']);

    // Modifie la mesure envoyé par le device.
    $router->put('devices/{idDevice}/mesures/{idMesure}', ['uses' => 'MesureController@update']);

    // Supprime la mesure enregistré.
    $router->delete('devices/{idDevice}/mesures/{idMesure}', ['uses' => 'MesureController@delete']);

    // Supprime le device.
    $router->delete('devices/{idDevice}', ['uses' => 'DeviceController@delete']);

});
