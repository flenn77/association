<?php
namespace App\Controller;

use App\Entity\User;
use App\Model\UserModel;
// use App\Controller\ErrorController;
use Core\Controller\DefaultController;

class UserController extends DefaultController {

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

    // public function loginPost() {    
    //     $this->model->getByEmail($_POST['mail']);
    // }
    
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
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            

            // Validate prenom
            if(empty(trim($_POST["prenom"]))){
                $prenom_err = "Entrez un prénom !";
            } elseif(!preg_match('/^[a-zA-Z]+$/', trim($_POST["prenom"]))){
                $prenom_err = "Un prénom ne doit contenir que des lettres !";
            } else {
                $prenom = trim($_POST['prenom']);
            } 

            if(empty(trim($_POST["nom"]))){
                $nom_err = "Entrez un nom !";
            } elseif(!preg_match('/^[a-zA-Z]+$/', trim($_POST["nom"]))){
                $nom_err = "Un nom ne doit contenir que des lettres !";
            } else {
                $nom = trim($_POST['nom']);
            }

            if(empty(trim($_POST["radioSexe"]))){
                $radioSexe_err = "Choisissez votre sexe";
            } else {
                $radioSexe = trim($_POST['radioSexe']);
            }

            if(empty(trim($_POST["adresse"]))){
                $adresse_err = "Entrez une adresse !";
            } elseif(!preg_match('/^[a-zA-Z0-9]+$/', trim($_POST["nom"]))){
                $adresse_err = "Une adresse ne doit contenir que des chiffres et des lettres !";
            } else {
                $adresse = trim($_POST['adresse']);
            }

            if(empty(trim($_POST["codePostal"]))){
                $codePostal_err = "Entrez un code postal !";
            } elseif(trim($_POST["codePostal"]) < 0){
                $codePostal_err = "Un code postal ne doit pas être inférieur à 0 !";
            } else {
                $codePostal = trim($_POST['codePostal']);
            }

            if(empty(trim($_POST["ville"]))){
                $ville_err = "Entrez une ville !";
            } elseif(!preg_match('/^[a-zA-Z]+$/', trim($_POST["ville"]))){
                $ville_err = "Une ville ne doit contenir que des lettres !";
            } else {
                $ville = trim($_POST['ville']);
            }

            if(empty(trim($_POST["tel"]))){
                $tel_err = "Entrez un numéro de téléphone !";
            } elseif(!preg_match('/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/', trim($_POST["tel"]))){
                $tel_err = 'Votre numéro de téléphone doit être au bon format !';
            } else {
                $tel = trim($_POST['tel']);
            }
            
            if(empty(trim($_POST["mail"]))){
                $mail_err = "Entrez un email !";
            } elseif(!preg_match('/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/', trim($_POST["mail"]))){
                $mail_err = 'Votre email doit être au bon format !';
            } else {
                $stmt = $this->model->findMailDuplicate(trim($_POST["mail"]));
                if ($stmt->rowCount() == 1) {
                    $mail_err = 'Cette email a déjà été utilisé !';
                } else {
                    $mail = trim($_POST["mail"]);
                }

                unset($stmt);
            }

            if(empty(trim($_POST["password"]))){
                $password_err = "Entrez un mot de passe !";
            } elseif(strlen(trim($_POST["password"])) < 6){
                $password_err = "Votre mot de passe doit avoir 6 caractères au minimum !";
            } else {
                $password = trim($_POST["password"]);
            }
            
            if(empty(trim($_POST["passwordRpt"]))){
                $passwordRpt_err = "Confirmez votre mot de passe !";
            } else {
                $passwordRpt = trim($_POST["passwordRpt"]);
                if (empty($password_err) && ($password != $passwordRpt)) {
                    $passwordRpt_err = "Les mots de passe ne correspondent pas !";
                }
            }

            var_dump(array($prenom_err, $nom_err,$radioSexe_err, $adresse_err,$codePostal_err, $ville_err,$tel_err, $mail_err, $password_err, $passwordRpt_err));

            if (empty($prenom_err) && empty($nom_err) && empty($radioSexe_err) && empty($adresse_err) && empty($codePostal_err) && empty($ville_err) && empty($tel_err) && empty($mail_err) && empty($password_err) && empty($passwordRpt_err)) {
                $user= new User;
                $user->setPrenom(htmlspecialchars($_POST['prenom']));
                $user->setNom(htmlspecialchars($_POST['nom']));
                $user->setSexe(htmlspecialchars($_POST['radioSexe']));
                $user->setAdresse(htmlspecialchars($_POST['adresse']));
                $user->setCodePostal(htmlspecialchars($_POST['codePostal']));
                $user->setVille(htmlspecialchars($_POST['ville']));
                $user->setTel(htmlspecialchars($_POST['tel']));
                $user->setMail(htmlspecialchars($_POST['mail']));
                $user->setPassword(htmlspecialchars(password_hash($_POST['password'], PASSWORD_DEFAULT)));
                // password_hash($_POST['password'], PASSWORD_DEFAULT);
                $user->setStatut("user");
    
                
                $this->model->save($user);
    
                $_POST = null;
    
                var_dump($_POST);
    
                header("Location: index.php?page=connexion");
                exit();
            } 

        } else {
            $this->render("user/registration");
        }

        // $data = [
        //     'prenom' => trim($_POST['prenom']),
        //     'nom' => trim($_POST['nom']),
        //     'radioSexe' => trim($_POST['prenom']),
        //     'adresse' => trim($_POST['adresse']),
        //     'codePostal' => trim($_POST['codePostal']),
        //     'ville' => trim($_POST['ville']),
        //     'tel' => trim($_POST['tel']),
        //     'mail' => trim($_POST['mail']),
        //     'password' => trim($_POST['password']),
        //     'passwordRpt' => trim($_POST['passwordRpt']),
        // ];

        // if (!empty($_POST) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['radioSexe']) && isset($_POST['adresse']) && isset($_POST['codePostal']) && isset($_POST['ville']) && isset($_POST['tel']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['passwordRpt'])) {

    }
}