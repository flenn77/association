<?php
namespace App\Controller;

use App\Model\AnimalModel;
use Core\Controller\DefaultController;

/**
 * Controller permettant d'afficher un ou plusieurs animaux disponible à l'adoption
 * 
 * @method void index() -> Affiche l'ensemble des animaux disponibles
 * @method void info() -> Affiche un animal en particulier
 */
final class AnimalController extends DefaultController
{
    /***************************
     * PROPRIETES DE LA CLASSE *
     ***************************/

    /**
     * Objet contenant la class AnimalModel
     *
     * @var AnimalModel
     */
    private AnimalModel $model;
    
    /*******************************************************************************************************************/



    /*************************
     * METHODES DE LA CLASSE *
     *************************/

    /**
     * Instancie les objets dont on a besoin dans toutes nos méthodes
     */
    public function __construct()
    {
        // Instanciation de la class AnimalModel
        $this->model = new AnimalModel;
    }

    /**
     * Page affichant tous les animaux disponible à l'adoption
     *
     * @return void
     */
    public function index(): void
    {
        // Affichage de la page 'animal/index.php' avec des données contenues dans un array
        $this->render("animal/index", [
            'animals' => $this->model->findAll()
        ]);
    }

    /**
     * Page affichant un animal en fonction de son Id
     *
     * @return void
     */
    public function info(): void
    {
        // Détecte si une variable id est présent dans l'URL et si elle possède une valeur
        if (isset($_GET['id']) && preg_match("(\d+)", $_GET['id'])) {

            // Assigne la valeur de l'id dans l'URL à une variable
            $id = intval($_GET['id']);
        }

        // Récupère les infos de l'animal qui correspond à l'Id et le stocke dans une variable
        $animal = $this->model->find($id);

        // Affichage de la page 'animal/detail.php' avec des données contenues dans un array
        $this->render("animal/detail", [
            'animals' => $animal
        ]);
    }
    
}