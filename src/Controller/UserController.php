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

    public function loginPost() {    
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
        if($_SERVER["REQUEST_METHOD"] == "POST") {
        
            // Validate prenom
            if(empty(trim($_POST["prenom"]))){
                $prenom_err = "Entrez un prénom !";
            } elseif(!preg_match('/^[a-zA-Z]+$/', trim($_POST["prenom"]))){
                $prenom_err = "Un prénom ne doit contenir que des lettres !";
            } 

            if(empty(trim($_POST["nom"]))){
                $nom_err = "Entrez un nom !";
            } elseif(!preg_match('/^[a-zA-Z]+$/', trim($_POST["nom"]))){
                $nom_err = "Un nom ne doit contenir que des lettres !";
            }

            if(empty(trim($_POST["radioSexe"]))){
                $radioSexe_err = "Choisissez votre sexe";
            }

            if(empty(trim($_POST["adresse"]))){
                $adresse_err = "Entrez une adresse !";
            } elseif(!preg_match('/^[a-zA-Z0-9]+$/', trim($_POST["nom"]))){
                $adresse_err = "Une adresse ne doit contenir que des chiffres et des lettres !";
            }

            if(empty(trim($_POST["codePostal"]))){
                $codePostal_err = "Entrez un code postal !";
            } elseif(trim($_POST["codePostal"])){
                $codePostal_err = "Une adresse ne doit contenir que des chiffres et des lettres !";
            }
            
            // {
            //     // Prepare a select statement
            //     $sql = "SELECT id FROM users WHERE username = :username";
                
            //     if($stmt = $pdo->prepare($sql)){
            //         // Bind variables to the prepared statement as parameters
            //         $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
                    
            //         // Set parameters
            //         $param_username = trim($_POST["username"]);
                    
            //         // Attempt to execute the prepared statement
            //         if($stmt->execute()){
            //             if($stmt->rowCount() == 1){
            //                 $username_err = "This username is already taken.";
            //             } else{
            //                 $username = trim($_POST["username"]);
            //             }
            //         } else{
            //             echo "Oops! Something went wrong. Please try again later.";
            //         }

            //         // Close statement
            //         unset($stmt);
            //     }
            // }
            
        //     // Validate password
        //     if(empty(trim($_POST["password"]))){
        //         $password_err = "Entrez un mot de passe !";     
        //     } elseif(strlen(trim($_POST["password"])) < 6){
        //         $password_err = "Password must have atleast 6 characters.";
        //     } else{
        //         $password = trim($_POST["password"]);
        //     }
            
        //     // Validate confirm password
        //     if(empty(trim($_POST["passwordRpt"]))){
        //         $confirm_password_err = "Confirmez votre mot de passe !";     
        //     } else{
        //         $confirm_password = trim($_POST["passwordRpt"]);
        //         if(empty($password_err) && ($password != $confirm_password)){
        //             $confirm_password_err = "Password did not match.";
        //         }
        //     }
            
        //     // Check input errors before inserting in database
        //     if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
                
        //         // Prepare an insert statement
        //         $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
                
        //         if($stmt = $pdo->prepare($sql)){
        //             // Bind variables to the prepared statement as parameters
        //             $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
        //             $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
                    
        //             // Set parameters
        //             $param_username = $username;
        //             $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                    
        //             // Attempt to execute the prepared statement
        //             if($stmt->execute()){
        //                 // Redirect to login page
        //                 header("location: login.php");
        //             } else{
        //                 echo "Oops! Something went wrong. Please try again later.";
        //             }

        //             // Close statement
        //             unset($stmt);
        //         }
        //     }
            
        //     // Close connection
        //     unset($pdo);
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

        if (!empty($_POST) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['radioSexe']) && isset($_POST['adresse']) && isset($_POST['codePostal']) && isset($_POST['ville']) && isset($_POST['tel']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['passwordRpt'])) {
            // $prenom = $this->verifDataRegister($_POST['prenom']);
            // $nom = $this->verifDataRegister($_POST['nom']);
            // $radioSexe = $this->verifDataRegister($_POST['radioSexe']);
            // $adresse = $this->verifDataRegister($_POST['adresse']);
            // $codePostal = $this->verifDataRegister($_POST['codePostal']);
            // $ville = $this->verifDataRegister($_POST['ville']);
            // $tel = $this->verifDataRegister($_POST['tel']);
            // $mail = $this->verifDataRegister($_POST['mail']);
            // $password = $this->verifDataRegister($_POST['password']);
            // $passwordRpt = $this->verifDataRegister($_POST['passwordRpt']);

            // if (empty($prenom)) {
            //     header("Location: index.php?page=inscription?error=Le prénom est requis");
            //     exit();
            // } else if (empty($nom)) {
            //     header("Location: index.php?page=inscription?error=Le nom est requis");
            //     exit();
            // }

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