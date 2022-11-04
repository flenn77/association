<?php
namespace App\Controller;

use App\Model\UserModel;
use Core\Controller\DefaultController;

class UserController extends DefaultController{

    private UserModel $model;
    
    /**
     * Instancie les objets dont on a besoin dans toutes nos méthodes
     */
    public function __construct()
    {
        $this->model = new UserModel;
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
        $this->render("user/index", [
            'users' => $this->model->findAll()
        ]);
    }

    public function login() {
        $this->render("user/login");
    }

    public function loginPost() {
        
        $this->model->getByEmail($_POST['mail']);

    }
    
    public function register() {
        $data = [
            'prenom' => trim($_POST['prenom']),
            'nom' => trim($_POST['nom']),
            'radioSexe' => trim($_POST['prenom']),
            'adresse' => trim($_POST['adresse']),
            'codePostal' => trim($_POST['codePostal']),
            'ville' => trim($_POST['ville']),
            'tel' => trim($_POST['tel']),
            'mail' => trim($_POST['mail']),
            'password' => trim($_POST['password']),
            'passwordRpt' => trim($_POST['passwordRpt']),
        ];

        

        $this->render("user/registration");
    }
}