<?php

namespace App\Controller;

use App\Entity\User;
use App\Model\UserModel;
use Core\Controller\DefaultController;

class UserController extends DefaultController
{

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

    public function login()
    {
        $this->render("user/login");
    }

    public function loginPost()
    {
        $this->model->getByEmail($_POST['mail']);
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
        $user = $this->model->find($id);

        $this->render("user/detail", [
            'users' => $user
        ]);
    }

    public function register()
    {
        $prenom = $nom = $radioSexe = $adresse = $codePostal = $ville = $tel = $mail = $password = $passwordRpt = "";
        $prenom_err = $nom_err = $radioSexe_err = $adresse_err = $codePostal_err = $ville_err = $tel_err = $mail_err = $password_err = $passwordRpt_err = "";

        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Validate prenom
            if (empty(trim($_POST["prenom"]))) {
                $prenom_err = "Entrez un prénom !";
            } elseif (!preg_match('/^[a-zA-Z]+$/', trim($_POST["prenom"]))) {
                $prenom_err = "Un prénom ne doit contenir que des lettres !";
            }

            if (empty(trim($_POST["nom"]))) {
                $nom_err = "Entrez un nom !";
            } elseif (!preg_match('/^[a-zA-Z]+$/', trim($_POST["nom"]))) {
                $nom_err = "Un nom ne doit contenir que des lettres !";
            }

            if (empty(trim($_POST["radioSexe"]))) {
                $radioSexe_err = "Choisissez votre sexe";
            }

            if (empty(trim($_POST["adresse"]))) {
                $adresse_err = "Entrez une adresse !";
            } elseif (!preg_match('/^[a-zA-Z0-9]+$/', trim($_POST["nom"]))) {
                $adresse_err = "Une adresse ne doit contenir que des chiffres et des lettres !";
            }

            if (empty(trim($_POST["codePostal"]))) {
                $codePostal_err = "Entrez un code postal !";
            } elseif (trim($_POST["codePostal"])) {
                $codePostal_err = "Une adresse ne doit contenir que des chiffres et des lettres !";
            }
        }



        if (!empty($_POST) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['radioSexe']) && isset($_POST['adresse']) && isset($_POST['codePostal']) && isset($_POST['ville']) && isset($_POST['tel']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['passwordRpt'])) {


            $user = new User;
            $user->setPrenom(htmlspecialchars($_POST['prenom']));
            $user->setNom(htmlspecialchars($_POST['nom']));
            $user->setSexe(htmlspecialchars($_POST['radioSexe']));
            $user->setAdresse(htmlspecialchars($_POST['adresse']));
            $user->setCodePostal(htmlspecialchars($_POST['codePostal']));
            $user->setVille(htmlspecialchars($_POST['ville']));
            $user->setTel(htmlspecialchars($_POST['tel']));
            $user->setMail(htmlspecialchars($_POST['mail']));
            $user->setPassword(htmlspecialchars($_POST['password']));
            // password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->setStatut("user");


            $this->model->save($user);

            $_POST = null;

            var_dump($_POST);

            header("Location: index.php?page=connexion");
            exit();
        } else {
            $this->render("user/registration");
        }
    }
}
