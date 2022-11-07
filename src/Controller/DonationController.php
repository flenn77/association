<?php
namespace App\Controller;

use App\Entity\Donation;
use App\Model\DonationModel;
use Core\Controller\DefaultController;

/**
 * Controller permettant d'afficher la page de donnation et de gérer les données des dons effectués
 * 
 * @method void thxDon() -> Renvoie l'utilisateur sur une page de remerciement
 * @method void info() -> Affiche un animal en particulier
 */
final class DonationController extends DefaultController 
{
    /***************************
     * PROPRIETES DE LA CLASSE *
     ***************************/

    /**
     * Objet contenant la class DonationModel
     *
     * @var DonationModel
     */
    private DonationModel $model;

    /**
     * Objet contenant la class MailController
     *
     * @var MailController
     */
    private MailController $mail;

    /*******************************************************************************************************************/



    /*************************
     * METHODES DE LA CLASSE *
     *************************/

    /**
     * Instancie les objets dont on a besoin dans toutes nos méthodes
     */
    public function __construct()
    {
        // Instanciation de la class DonationModel
        $this->model = new DonationModel;
        // Instanciation de la class MailController
        $this->mail = new MailController;
    }

    /**
     * Renvoie l'utilisateur sur une page de remerciement
     *
     * @return void
     */
    public function thxDon()
    {
        // Affichage de la page 'donation/donFait.php'
        $this->render('donation/donFait');
    }

    /**
     * Affiche la page pour réaliser une donnation.
     * 
     * L'utilisateur devra y rentrer ses informations personnelles, 
     * les informations de sa carte bancaire et pour finir le montant à verser.
     *
     * @return void
     */
    public function index()
    {   
        /**
         * Vérification de l'utilisation d'une méthode POST
         */
        if (!empty($_POST) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['codePostal']) && isset($_POST['ville']) && isset($_POST['tel']) && isset($_POST['mail']) && isset($_POST['montant'])) {
            
            /**
             * Attribution des informations renseigné par l'utilisateur avec la méthode POST dans l'objet $donation
             */
            $donation= new Donation;
            $donation->setPrenom(htmlspecialchars($_POST['prenom']));
            $donation->setNom(htmlspecialchars($_POST['nom']));
            $donation->setAdresse(htmlspecialchars($_POST['adresse']));
            $donation->setCodePostal(htmlspecialchars($_POST['codePostal']));
            $donation->setVille(htmlspecialchars($_POST['ville']));
            $donation->setTel(strval(htmlspecialchars($_POST['tel'])));
            $donation->setMail(htmlspecialchars($_POST['mail']));
            $donation->setMontant(htmlspecialchars($_POST['montant']));
 
            // Ajout des informations concernant le don dans la BDD 
            $this->model->save($donation);
            
            // Modification du header (Permet de réinitialiser la méthode POST)
            header("Location: ?page=donFait");

            /**
             * Envoi d'un mail de remerciement à l'adresse mail renseigné par le donnateur
             */
            $this->mail->sendMail($_POST['mail'], 
                'Merci pour le don',
                '<h1>Bonjour '.$_POST['prenom'].'</h1><br/> 
                Nous avons recu votre don de '.$_POST['montant'].' euro(s) <br/> 
                <h3>merci de votre contribution, votre geste nous aide ennormement ! *_*</h3>' 
            );

            // Reload de la page
            exit();
        } else {

            // Affichage de la page 'animal/index.php' avec des données contenues dans un array
            $this->render("donation/index", [
                'donations' => $this->model->Somme()
            ]);
        }
    }
}