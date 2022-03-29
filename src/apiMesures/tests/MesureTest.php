<?php


use PHPUnit\Framework\TestCase;

use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Models\Mesure;

class MesureTest extends TestCase
{
    //migre la bd lors de l'exécution des tests, puis annule la bd lorsque les tests sont terminés.
    use DatabaseTransactions;

    // Création de variables permettant d'effectuer les tests
    private $mesures = "";

    /**
     * Affectation des variables avec la factory
     * Cette méthode est lancée avant l'exécution des tests
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->mesures = Mesure::factory()->count(2)->create();
    }


    /**
     * Test de la Methode GET en récupérant toutes les mesures
     *
     * @return void
     */
    public function testShowAllTasks()
    {
        $this->get('api/mesures');
        $this->assertResponseOk(); //Affirme que la réponse a un code d'état 200:
    }

    /**
     * Test de la Methode GET en récupérant 1 mesure selon le 1er id récupéré
     *
     * @return void
     */
    public function testShowOneTask()
    {
        $this->get('api/mesures/' . $this->mesures[0]->id);
        $this->assertResponseOk();//Affirme que la réponse a un code d'état 200:
    }

    /**
     *
     * Test de la Methode POST en envoyant une nouvelle mesure dans la BD
     *
     * @return void
     */
    public function testCreate()
    {
        $mesures = Mesure::factory()->make();


        $this->post('api/mesures',
            [
                'temperature_mes' => $mesures->temperature_mes,
                'date_mes' => $mesures->date_mes,
                'heure_mes' => $mesures->heure_mes
            ]);

        $this->assertResponseOk(); //Affirme que la réponse a un code d'état 201:

        $this->seeJsonContains(
            [
                'temperature_mes' => $mesures->temperature_mes,
                'date_mes' => $mesures->date_mes,
                'heure_mes' => $mesures->heure_mes
            ]);

        $this->seeInDatabase('mesures', [
            'temperature_mes' => $mesures->temperature_mes,
            'date_mes' => $mesures->date_mes,
            'heure_mes' => $mesures->heure_mes
        ]);
    }
}
