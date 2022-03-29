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

    // Retourne un tableau de toutes les valeurs enregistré par un device.
    $router->get('mesures', ['uses' => 'MesureController@showAllMeasures']);

    // Retourne une valeur enregistré.
    $router->get('mesures/{id}', ['uses' => 'MesureController@showOneMeasures']);

    // Créé un tableau des nouvelles valeurs enregistré par le device
    $router->post('mesures', ['uses' => 'MesureController@create']);

    // Modifie les valeurs envoyé par le device
    $router->put('mesures/{id}', ['uses' => 'MesureController@update']);

    // Supprime les valeurs enregistré
    $router->delete('mesures/{id}', ['uses' => 'MesureController@delete']);



});
