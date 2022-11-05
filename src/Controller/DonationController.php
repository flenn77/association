<?php
namespace App\Controller;

use App\Entity\Donation;
use App\Model\DonationModel;
use Core\Controller\DefaultController;

class DonationController extends DefaultController 
{
    private DonationModel $model;
    
    /**
     * Instancie les objets dont on a besoin dans toutes nos méthodes
     */
    public function __construct()
    {
        $this->model = new DonationModel;
    }

    /**
     * Page affichant toutes nos catégories
     *
     * @return void
     */
    public function index()
    {
        // $categories = $this->model->findAll();
        // require_once ROOT."/templates/User/index.php";
        $this->render("donation/index", [
            'donations' => $this->model->findAll()
        ]);
    }

    public function login() 
    {
        $this->render("donation/donFait");
    }



    public function register()
    {
        if (!empty($_POST) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['codePostal']) && isset($_POST['ville']) && isset($_POST['tel']) && isset($_POST['mail']) && isset($_POST['montant'])) {
            $donation= new Donation;
            $donation->setPrenom(htmlspecialchars($_POST['prenom']));
            $donation->setNom(htmlspecialchars($_POST['nom']));
            $donation->setAdresse(htmlspecialchars($_POST['adresse']));
            $donation->setCodePostal(htmlspecialchars($_POST['codePostal']));
            $donation->setVille(htmlspecialchars($_POST['ville']));
            $donation->setTel(htmlspecialchars($_POST['tel']));
            $donation->setMail(htmlspecialchars($_POST['mail']));
            $donation->setMontant(htmlspecialchars($_POST['montant']));
 
            $this->model->save($donation);

            $_POST = null;

            var_dump($_POST);

            header("Location: index.php?page=donFait");
            exit();
        } else {
            $this->render("donation/index");
        }

    }
}