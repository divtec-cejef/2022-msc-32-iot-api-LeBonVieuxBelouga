<?php

use PHPUnit\Framework\TestCase;

use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Models\Device;

class DeviceTest extends TestCase
{
    //migre la bd lors de l'exécution des tests, puis annule la bd lorsque les tests sont terminés.
    use DatabaseTransactions;

    // Création de variables permettant d'effectuer les tests
    private $devices = "";

    /**
     * Affectation des variables avec la factory
     * Cette méthode est lancée avant l'exécution des tests
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->devices = Device::factory()->count(2)->create();
    }

    /**
     * Test de la Methode GET en récupérant toutes les devices
     *
     * @return void
     */
    public function testShowAllTasks()
    {
        $this->get('api/devices');
        $this->assertResponseOk(); //Affirme que la réponse a un code d'état 200:
    }

    /**
     * Test de la Methode GET en récupérant 1 device selon le 1er id récupéré
     *
     * @return void
     */
    public function testShowOneTask()
    {
        $this->get('api/devices/' . $this->devices[0]->id);
        $this->assertResponseOk();//Affirme que la réponse a un code d'état 200:
    }

    /**
     *
     * Test de la Methode POST en envoyant un nouveau device dans la BD
     *
     * @return void
     */
    public function testCreate()
    {
        $devices = Device::factory()->make();


        $this->post('api/devices',
            [
                'identifiant_dev' => $devices->identifiant_dev,
                'nom_dev' => $devices->nom_dev,
                ]);

        $this->assertResponseOk(); //Affirme que la réponse a un code d'état 201:
        $this->seeJsonContains(
            [
                'identifiant_dev' => $devices->identifiant_dev,
                'nom_dev' => $devices->nom_dev,
            ]);
        $this->seeInDatabase('devices', [
            'identifiant_dev' => $devices->identifiant_dev,
            'nom_dev' => $devices->nom_dev,
        ]);
    }
}
