<?php
namespace App\Controller;

use App\Model\ProduitModel;
use Core\Controller\DefaultController;

final class ProduitController extends DefaultController
{
    private ProduitModel $model;
    
    /**
     * Instancie les objets dont on a besoin dans toutes nos méthodes
     */
    public function __construct()
    {
        $this->model = new ProduitModel;
    }

    /**
     * Page affichant toutes nos catégories
     *
     * @return void
     */
    public function index()
    {
        $this->render("produit/index", [
            'produits' => $this->model->findAll()
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
        $produit = $this->model->find($id);

        $this->render("produit/detail", [
            'produits' => $produit
        ]);
    }
}