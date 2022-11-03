<?php
namespace App\Controller;

use App\Model\AnimalModel;
use Core\Controller\DefaultController;

class AnimalController extends DefaultController{

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

    
}