<?php
namespace App\Controller;

use App\Model\ProduitModel;
use Core\Controller\DefaultController;

/**
 * Controller permettant d'afficher la page des produits et d'acheter ceux-ci
 * 
 * @method void index() -> Affiche l'ensemble des produits disponibles
 * @method void info() -> Affiche un produit en particulier
 */
final class ProduitController extends DefaultController
{
    /***************************
     * PROPRIETES DE LA CLASSE *
     ***************************/

    /**
     * Objet contenant la class ProduitModel
     *
     * @var ProduitModel
     */
    private ProduitModel $model;
    
    /*******************************************************************************************************************/



    /*************************
     * METHODES DE LA CLASSE *
     *************************/

    /**
     * Instancie les objets dont on a besoin dans toutes nos méthodes
     */
    public function __construct()
    {
        // Instanciation de la class ProduitModel
        $this->model = new ProduitModel;
    }

    /**
     * Page affichant tous les produits disponibles à l'achat
     *
     * @return void
     */
    public function index()
    {
        // Affichage de la page 'produit/index.php' avec des données contenues dans un array
        $this->render("produit/index", [
            'produits' => $this->model->findAll()
        ]);
    }

    /**
     * Page affichant un produit en fonction de son Id
     *
     * @return void
     */
    public function info()
    {  
        // Détecte si une variable id est présent dans l'URL et si elle possède une valeur
        if (isset($_GET['id']) && preg_match("(\d+)", $_GET['id'])) {

            // Assigne la valeur de l'id dans l'URL à une variable
            $id = intval($_GET['id']);
        }


        // Récupère les infos du produit qui correspond à l'Id et le stocke dans une variable
        $produit = $this->model->find($id);

        // Affichage de la page 'produit/index.php' avec des données contenues dans un array
        $this->render("produit/detail", [
            'produits' => $produit
        ]);
    }
}