<?php


use PHPUnit\Framework\TestCase;

use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Models\Salle;

class SalleTest extends TestCase
{
    //migre la bd lors de l'exécution des tests, puis annule la bd lorsque les tests sont terminés.
    use DatabaseTransactions;

    // Création de variables permettant d'effectuer les tests
    private $salles = "";

    /**
     * Affectation des variables avec la factory
     * Cette méthode est lancée avant l'exécution des tests
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->salles = Salle::factory()->count(2)->create();
    }

    /**
     * Test de la Methode GET en récupérant toutes les salles
     *
     * @return void
     */
    public function testShowAllTasks()
    {
        $this->get('api/salles');
        $this->assertResponseOk(); //Affirme que la réponse a un code d'état 200:
    }

    /**
     * Test de la Methode GET en récupérant 1 salle selon le 1er id récupéré
     *
     * @return void
     */
    public function testShowOneTask()
    {
        $this->get('api/salles/' . $this->salles[0]->id);
        $this->assertResponseOk();//Affirme que la réponse a un code d'état 200:
    }


    /**
     *
     * Test de la Methode POST en envoyant une nouvelle salle dans la BD
     *
     * @return void
     */
    public function testCreate()
    {
        $salles = Salle::factory()->make();


        $this->post('api/salles',
            [
                'numero_sal' => $salles->numero_sal,
            ]);

        $this->assertResponseOk(); //Affirme que la réponse a un code d'état 201:

        $this->seeJsonContains(
            [
                'numero_sal' => $salles->numero_sal,
            ]);

        $this->seeInDatabase('salles', [
            'numero_sal' => $salles->numero_sal,
        ]);
    }

    public function testUpdate()
    {
        $tache = $this->taches[0];
        $newtache  = [
            'id' => $tache->id,
            'titre' => $tache->titre.'test',
            'contenu' => $tache->contenu." test test",
            'ordre' => $tache->ordre+20,
            'complet' => $tache->complet,
            'date_fin' => $tache->date_fin
        ];

        $this->put('api/taches/'.$tache->id, $newtache);

        $this->assertResponseOk(); //Affirme que la réponse a un code d'état 200:
        $this->seeJsonContains($newtache);
        $this->seeInDatabase('taches', $newtache);
    }
}
