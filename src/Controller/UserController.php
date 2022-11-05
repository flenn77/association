<?php
namespace App\Controller;

use App\Entity\User;
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

        var_dump($data);

        $this->render("user/registration");
    }

    public function registerPost() {
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

        var_dump($data);

        $this->render("user/registration");
    }

    public function addUser()
    {
        if (!empty($_POST) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['radioSexe']) && isset($_POST['adresse']) && isset($_POST['codePostal']) && isset($_POST['ville']) && isset($_POST['tel']) && isset($_POST['mail']) && isset($_POST['password'])) {
            $user= new User;
            $user->setPrenom(htmlspecialchars($_POST['prenom']));
            $user->setNom(htmlspecialchars($_POST['nom']));
            $user->setSexe(htmlspecialchars($_POST['radioSexe']));
            $user->setAdresse(htmlspecialchars($_POST['adresse']));
            $user->setCodePostal(htmlspecialchars($_POST['codePostal']));
            $user->setVille(htmlspecialchars($_POST['ville']));
            $user->setTel(htmlspecialchars($_POST['tel']));
            $user->setMail(htmlspecialchars($_POST['mail']));
            $user->setPassword(htmlspecialchars($_POST['password']));
            
            $this->model->save($user);
        }

        $this->render("user/registration");
    }
}