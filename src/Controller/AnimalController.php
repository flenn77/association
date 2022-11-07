<?php
namespace App\Controller;

use App\Model\AnimalModel;
use Core\Controller\DefaultController;

final class AnimalController extends DefaultController{

    private AnimalModel $model;
    
    /**
     * Instancie les objets dont on a besoin dans toutes nos méthodes
     */
    public function __construct()
    {
        $this->model = new AnimalModel;
    }

    /**
     * Page affichant toutes nos catégories
     *
     * @return void
     */
    public function index()
    {
        $this->render("animal/index", [
            'animals' => $this->model->findAll()
        ]);
    }

  /**
     * Page affichant une catégorie en fonction de son id
     *
     * @return void
     */
    public function info()
    {
        if (isset($_GET['id']) && preg_match("(\d+)", $_GET['id'])) {
            $id = intval($_GET['id']);
        }
        $animal = $this->model->find($id);

        $this->render("animal/detail", [
            'animals' => $animal
        ]);
    }
    
}