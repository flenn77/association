<?php
namespace App\Controller;

use App\Entity\User;
use App\Model\UserModel;
// use App\Controller\ErrorController;
use App\Controller\MailController;
use Core\Controller\DefaultController;

class UserController extends DefaultController {

    private UserModel $model;

    private MailController $sendMail;

    public string $prenom = "";
    public string $nom = "";
    public string $radioSexe = "";
    public string $adresse = "";
    public string $codePostal = "";
    public string $ville = "";
    public string $tel = "";
    public string $mail = "";
    public string $password = "";
    public string $passwordRpt = "";

    public string $prenom_err = "";
    public string $nom_err = "";
    public string $radioSexe_err = "";
    public string $adresse_err = "";
    public string $codePostal_err = "";
    public string $ville_err = "";
    public string $tel_err = "";
    public string $mail_err = "";
    public string $password_err = "";
    public string $passwordRpt_err = "";

    /**
     * Instancie les objets dont on a besoin dans toutes nos méthodes
     */
    public function __construct()
    {
        $this->model = new UserModel;
        $this->sendMail = new MailController;
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
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->mail = "";
            $this->password = "";
            $this->mail_err = "";
            $this->password_err = "";
            $this->login_err = "";
            
            if(empty(trim($_POST["mail"]))){
                $this->mail_err = "Entrez un email !";
            } elseif(!preg_match('/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/', trim($_POST["mail"]))){
                $this->mail_err = 'Votre email doit être au bon format !';
            } else {
                $this->mail = trim($_POST["mail"]);
            }

            if(empty(trim($_POST["password"]))){
                $this->password_err = "Entrez un mot de passe !";
            } else {
                $this->password = trim($_POST["password"]);
            }

            if(empty($this->mail_err) && empty($this->password_err)) {
                $stmt = $this->model->searchUser(trim($_POST["mail"]));

                if ($stmt->rowCount() == 1) {
                    if ($row = $stmt->fetch()) {
                        $idRow = $row['id'];
                        $mailRow = $row['mail'];
                        $passwordHashRow = $row['password'];

                        if (password_verify($this->password,$passwordHashRow)) {
                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $idRow;
                            $_SESSION["mail"] = $mailRow;

                            header("Location: index.php");
                            exit();
                        } else {
                            $this->login_err = "Mauvais mail ou mot de passe !";
                        }
                    }
                } else {
                    $this->login_err = "Mauvais mail ou mot de passe !";
                }               
            }

            var_dump(array($this->mail_err, $this->password_err, $this->login_err));

            unset($stmt);
        } else {
            $this->render("user/login");
        }
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
        // $prenom = $nom = $radioSexe = $adresse = $codePostal = $ville = $tel = $mail = $password = $passwordRpt = "";
        // $prenom_err = $nom_err = $radioSexe_err = $adresse_err = $codePostal_err = $ville_err = $tel_err = $mail_err = $password_err = $passwordRpt_err = "";

        // Processing form data when form is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            

            // Validate prenom
            if(empty(trim($_POST["prenom"]))){
                $this->prenom_err = "Entrez un prénom !";
            } elseif(!preg_match('/^[a-zA-Z]+$/', trim($_POST["prenom"]))){
                $this->prenom_err = "Un prénom ne doit contenir que des lettres !";
            } else {
                $this->prenom = trim($_POST['prenom']);
            } 

            if(empty(trim($_POST["nom"]))){
                $this->nom_err = "Entrez un nom !";
            } elseif(!preg_match('/^[a-zA-Z]+$/', trim($_POST["nom"]))){
                $this->nom_err = "Un nom ne doit contenir que des lettres !";
            } else {
                $this->nom = trim($_POST['nom']);
            }

            if(empty(trim($_POST["radioSexe"]))){
                $this->radioSexe_err = "Choisissez votre sexe";
            } else {
                $this->radioSexe = trim($_POST['radioSexe']);
            }

            if(empty(trim($_POST["adresse"]))){
                $this->adresse_err = "Entrez une adresse !";
            } elseif(!preg_match('/^[a-zA-Z0-9]+$/', trim($_POST["nom"]))){
                $this->adresse_err = "Une adresse ne doit contenir que des chiffres et des lettres !";
            } else {
                $this->adresse = trim($_POST['adresse']);
            }

            if(empty(trim($_POST["codePostal"]))){
                $this->codePostal_err = "Entrez un code postal !";
            } elseif(trim($_POST["codePostal"]) < 0){
                $this->codePostal_err = "Un code postal ne doit pas être inférieur à 0 !";
            } else {
                $this->codePostal = trim($_POST['codePostal']);
            }

            if(empty(trim($_POST["ville"]))){
                $this->ville_err = "Entrez une ville !";
            } elseif(!preg_match('/^[a-zA-Z]+$/', trim($_POST["ville"]))){
                $this->ville_err = "Une ville ne doit contenir que des lettres !";
            } else {
                $this->ville = trim($_POST['ville']);
            }

            if(empty(trim($_POST["tel"]))){
                $this->tel_err = "Entrez un numéro de téléphone !";
            } elseif(!preg_match('/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/', trim($_POST["tel"]))){
                $this->tel_err = 'Votre numéro de téléphone doit être au bon format !';
            } else {
                $this->tel = trim($_POST['tel']);
            }
            
            if(empty(trim($_POST["mail"]))){
                $this->mail_err = "Entrez un email !";
            } elseif(!preg_match('/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/', trim($_POST["mail"]))){
                $this->mail_err = 'Votre email doit être au bon format !';
            } else {
                $stmt = $this->model->findMailDuplicate(trim($_POST["mail"]));
                if ($stmt->rowCount() == 1) {
                    $this->mail_err = 'Cette email a déjà été utilisé !';
                } else {
                    $this->mail = trim($_POST["mail"]);
                }

                unset($stmt);
            }

            if(empty(trim($_POST["password"]))){
                $this->password_err = "Entrez un mot de passe !";
            } else {
                $this->password = trim($_POST["password"]);
            }
            
            if(empty(trim($_POST["passwordRpt"]))){
                $this->passwordRpt_err = "Confirmez votre mot de passe !";
            } else {
                $this->passwordRpt = trim($_POST["passwordRpt"]);
                if (empty($password_err) && ($this->password != $this->passwordRpt)) {
                    $this->passwordRpt_err = "Les mots de passe ne correspondent pas !";
                }
            }

            //var_dump(array($prenom_err, $nom_err,$radioSexe_err, $adresse_err,$codePostal_err, $ville_err,$tel_err, $mail_err, $password_err, $passwordRpt_err));

            if (empty($this->prenom_err) && empty($this->nom_err) && empty($this->radioSexe_err) && empty($this->adresse_err) && empty($this->codePostal_err) && empty($this->ville_err) && empty($this->tel_err) && empty($this->mail_err) && empty($this->password_err) && empty($this->passwordRpt_err)) {
                $user= new User;
                $user->setPrenom(htmlspecialchars($_POST['prenom']));
                $user->setNom(htmlspecialchars($_POST['nom']));
                $user->setSexe(htmlspecialchars($_POST['radioSexe']));
                $user->setAdresse(htmlspecialchars($_POST['adresse']));
                $user->setCodePostal(htmlspecialchars($_POST['codePostal']));
                $user->setVille(htmlspecialchars($_POST['ville']));
                $user->setTel(htmlspecialchars($_POST['tel']));
                $user->setMail(htmlspecialchars($_POST['mail']));
                $user->setverifMail(0);
                $user->setPassword(htmlspecialchars(password_hash($_POST['password'], PASSWORD_DEFAULT)));
                // password_hash($_POST['password'], PASSWORD_DEFAULT);
                $user->setStatut("user");
    
                
                $this->model->save($user);
    
                header("Location: ?page=connexion");

                $this->sendMail->sendMail($_POST['mail'], 
                    'Création compte',
                    '<h1>Bonjour '.$_POST['prenom'].'</h1><br/> 
                    <p>Votre compte à été crée avec succès ! Pour pouvoir y accéder, cliquez sur ce lien : </p><br/>
                    <p><a href="https://localhost/association/?page=verifmail&mail='. $_POST['mail'] .'">Vérifier votre email</a></p><br />
                    <p>Cordialement,<p><br /><br />
                    <h3>Association De A à Zebre</h3>' 
                );

                exit();
            } else {
                $this->render("user/registration", [
                    'prenom_err' => $this->prenom_err,
                    'nom_err' => $this->nom_err,
                    'radioSexe_err' => $this->radioSexe_err,
                    'adresse_err' => $this->adresse_err,
                    'codePostal_err' => $this->codePostal_err,
                    'ville_err' => $this->ville_err,
                    'tel_err' => $this->tel_err,
                    'mail_err' => $this->mail_err,
                    'password_err' => $this->password_err,
                    'passwordRpt_err' => $this->passwordRpt_err
                ]);
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

    public function verifMail(string $mailUser): void
    {
        $this->model->updateBy('verifMail', '1', 'mail', '"'.$mailUser.'"');

        header("Location: ?page=connexion");
        exit();
    }
}