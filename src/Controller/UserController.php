<?php
namespace App\Controller;

use App\Entity\User;
use App\Model\UserModel;
use App\Controller\ErrorController;
use App\Controller\MailController;
use Core\Controller\DefaultController;

/**
 * Controller permettant de gérer les utilisateurs (inscription, login, verification du mail, ...)
 * 
 * @method void index() -> Renvoie l'utilisateur sur une page de remerciement
 * @method void login() -> Affiche un animal en particulier
 */
final class UserController extends DefaultController 
{
    /***************************
     * PROPRIETES DE LA CLASSE *
     ***************************/

    /**
     * Objet contenant la class UserModel
     *
     * @var UserModel
     */
    private UserModel $model;

    /**
     * Objet contenant la class MailController
     *
     * @var MailController
     */
    private MailController $sendMail;

    /**
     * Variable contenant le mail de l'utilisateur
     *
     * @var string
     */
    public string $mail = "";

    /**
     * Variable contenant le mot de passe de l'utilisateur
     *
     * @var string
     */
    public string $password = "";

    /**
     * Variables contenant des messages d'erreur concernant les champs à remplir
     *
     * @var string
     */
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

    /*******************************************************************************************************************/



    /*************************
     * METHODES DE LA CLASSE *
     *************************/

    /**
     * Instancie les objets dont on a besoin dans toutes nos méthodes
     */
    public function __construct()
    {
        // Instanciation de la class UserModel
        $this->model = new UserModel;
        // Instanciation de la class MailController
        $this->sendMail = new MailController;
    }

    /**
     * Récupère et vérifie les informations du formulaire de connexion
     *
     * @return void
     */
    public function login() 
    {
        // Détection d'une méthode POST  
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $this->mail = "";
            $this->password = "";
            $this->mail_err = "";
            $this->password_err = "";
            $this->login_err = "";
            
            // Vérification du champ mail. Si faux, un message d'erreur est assigné à une variable.
            if(empty(trim($_POST["mail"]))){
                $this->mail_err = "Entrez un email !";
            } elseif(!preg_match('/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/', trim($_POST["mail"]))){
                $this->mail_err = 'Votre email doit être au bon format !';
            } else {
                $this->mail = trim($_POST["mail"]);
            }

            // Vérification du champ password. Si faux, un message d'erreur est assigné à une variable.
            if(empty(trim($_POST["password"]))){
                $this->password_err = "Entrez un mot de passe !";
            } else {
                $this->password = trim($_POST["password"]);
            }

            /**
             * Vérification de l'absence d'erreur dans les champs
             */
            if(empty($this->mail_err) && empty($this->password_err)) {

                // Récupère les informations du compte à l'aide du mail 
                $stmt = $this->model->searchUser(trim($_POST["mail"]));

                if ($stmt->rowCount() == 1) {
                    if ($row = $stmt->fetch()) {
                        $idRow = $row['id'];
                        $mailRow = $row['mail'];
                        $passwordHashRow = $row['password'];

                        // Vérifie si le mot de passe correspond à celui du compte dans la BDD
                        if (password_verify($this->password,$passwordHashRow)) {
                            // Lancement de la session
                            session_start();

                            // Attribution de valeurs dans la session
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $idRow;
                            $_SESSION["mail"] = $mailRow;

                            // Modification du header (Permet de réinitialiser la méthode POST)
                            header("Location: index.php");

                            // Reload de la page
                            exit();
                        } else {
                            $this->login_err = "Mauvais mail ou mot de passe !";
                        }
                    }
                } else {
                    $this->login_err = "Mauvais mail ou mot de passe !";
                }               
            }
            unset($stmt);
        } else {
            // Affichage de la page 'user/login.php'
            $this->render("user/login");
        }
    }

    /**
     * Récupère, vérifie et ajoute à la BDD les informations du formulaire d'inscription
     *
     * @return void
     */
    public function register()
    {
        // Détection d'une méthode POST  
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            // Vérification du champ prénom. Si faux, un message d'erreur est assigné à une variable.
            if (empty(trim($_POST["prenom"]))){
                $this->prenom_err = "Entrez un prénom !";
            } elseif (!preg_match('/^[a-zA-Z]+$/', trim($_POST["prenom"]))){
                $this->prenom_err = "Un prénom ne doit contenir que des lettres !";
            }

            // Vérification du champ nom. Si faux, un message d'erreur est assigné à une variable.
            if (empty(trim($_POST["nom"]))){
                $this->nom_err = "Entrez un nom !";
            } elseif (!preg_match('/^[a-zA-Z]+$/', trim($_POST["nom"]))){
                $this->nom_err = "Un nom ne doit contenir que des lettres !";
            }

            // Vérification du champ radioSexe. Si faux, un message d'erreur est assigné à une variable.
            if (empty(trim($_POST["radioSexe"]))){
                $this->radioSexe_err = "Choisissez votre sexe";
            }

            // Vérification du champ adresse. Si faux, un message d'erreur est assigné à une variable.
            if (empty(trim($_POST["adresse"]))){
                $this->adresse_err = "Entrez une adresse !";
            } elseif (!preg_match('/^[a-zA-Z0-9]+$/', trim($_POST["nom"]))){
                $this->adresse_err = "Une adresse ne doit contenir que des chiffres et des lettres !";
            }

            // Vérification du champ codePostal. Si faux, un message d'erreur est assigné à une variable.
            if (empty(trim($_POST["codePostal"]))){
                $this->codePostal_err = "Entrez un code postal !";
            } elseif (trim($_POST["codePostal"]) < 0){
                $this->codePostal_err = "Un code postal ne doit pas être inférieur à 0 !";
            }

            // Vérification du champ ville. Si faux, un message d'erreur est assigné à une variable.
            if (empty(trim($_POST["ville"]))){
                $this->ville_err = "Entrez une ville !";
            } elseif (!preg_match('/^[a-zA-Z]+$/', trim($_POST["ville"]))){
                $this->ville_err = "Une ville ne doit contenir que des lettres !";
            }

            // Vérification du champ tel. Si faux, un message d'erreur est assigné à une variable.
            if (empty(trim($_POST["tel"]))){
                $this->tel_err = "Entrez un numéro de téléphone !";
            } elseif (!preg_match('/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/', trim($_POST["tel"]))){
                $this->tel_err = 'Votre numéro de téléphone doit être au bon format !';
            }
            
            // Vérification du champ mail. Si faux, un message d'erreur est assigné à une variable.
            // Vérifie en plus si le mail est déjà présent dans la BDD (si oui, renvoie une erreur)
            if (empty(trim($_POST["mail"]))){
                $this->mail_err = "Entrez un email !";
            } elseif (!preg_match('/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/', trim($_POST["mail"]))){
                $this->mail_err = 'Votre email doit être au bon format !';
            } else {
                $stmt = $this->model->findMailDuplicate(trim($_POST["mail"]));
                if ($stmt->rowCount() == 1) {
                    $this->mail_err = 'Cette email a déjà été utilisé !';
                }
                unset($stmt);
            }

            // Vérification du champ password. Si faux, un message d'erreur est assigné à une variable.
            if (empty(trim($_POST["password"]))){
                $this->password_err = "Entrez un mot de passe !";
            }
            
            // Vérification du champ de confirmation du mot de passe. Si faux, un message d'erreur est assigné à une variable.
            if (empty(trim($_POST["passwordRpt"]))){
                $this->passwordRpt_err = "Confirmez votre mot de passe !";
            } else {
                $this->passwordRpt = trim($_POST["passwordRpt"]);
                if (empty($password_err) && (trim($_POST["password"]) != $this->passwordRpt)) {
                    $this->passwordRpt_err = "Les mots de passe ne correspondent pas !";
                }
            }


            /**
             * Vérification de l'absence d'erreur dans les champs
             */
            if (empty($this->prenom_err) && empty($this->nom_err) && empty($this->radioSexe_err) && empty($this->adresse_err) && empty($this->codePostal_err) && empty($this->ville_err) && empty($this->tel_err) && empty($this->mail_err) && empty($this->password_err) && empty($this->passwordRpt_err)) {
                
                /**
                 * Attribution des informations renseigné par l'utilisateur avec la méthode POST dans l'objet $user
                 */
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
                $user->setStatut("user");
    
                // Ajout des informations concernant le don dans la BDD 
                $this->model->save($user);
    
                // Modification du header (Permet de réinitialiser la méthode POST)
                header("Location: ?page=connexion");

                /**
                 * Envoi d'un mail de remerciement à l'adresse mail renseigné par le donnateur
                 */
                $this->sendMail->sendMail($_POST['mail'], 
                    'Création compte',
                    '<h1>Bonjour '.$_POST['prenom'].'</h1><br/> 
                    <p>Votre compte à été crée avec succès ! Pour pouvoir y accéder, cliquez sur ce lien : </p><br/>
                    <p><a href="localhost/association/?page=verifmail&mail='. $_POST['mail'] .'">Vérifier votre email</a></p><br />
                    <p>Cordialement,<p><br /><br />
                    <h3>Association De A à Zebre</h3>' 
                );

                // Reload de la page
                exit();
            } else {
                // Affichage de la page 'user/registration.php' avec des données d'erreur contenues dans un array
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
            // Affichage de la page 'user/registration.php'
            $this->render("user/registration");
        }
    }

    /**
     * Modifie la BDD d'un utilisateur pour indiquer que son mail à été vérifié
     *
     * @param string $mailUser -> mail du compte qui doit êtrre vérifié
     * @return void
     */
    public function verifMail(string $mailUser): void
    {
        $this->model->updateBy('verifMail', '1', 'mail', '"'.$mailUser.'"');

        // Modification du header (Permet de réinitialiser la méthode POST)
        header("Location: ?page=connexion");

        // Reload de la page
        exit();
    }

    // /**
    //  * Page affichant toutes nos catégories
    //  *
    //  * @return void
    //  */
    // public function index()
    // {
    //     // Affichage de la page 'user/index.php' avec des données contenues dans un array
    //     $this->render("user/index", [
    //         'users' => $this->model->findAll()
    //     ]);
    // }

    // /**
    //  * Page affichant une catégorie en fonction de son id
    //  *
    //  * @return void
    //  */
    // public function info()
    // {
    //     // Détecte si une variable id est présent dans l'URL et si elle possède une valeur
    //     if (isset($_GET['id']) && preg_match("(\d+)", $_GET['id'])) {

    //         // Assigne la valeur de l'id dans l'URL à une variable
    //         $id = intval($_GET['id']);
    //     }

    //     // Récupère les infos de l'utilisateur qui correspond à l'Id et le stocke dans une variable
    //     $user = $this->model->find($id);

    //     // Affichage de la page 'user/detail.php' avec des données contenues dans un array
    //     $this->render("user/detail", [
    //         'users' => $user
    //     ]);
    // }
}