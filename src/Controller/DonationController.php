<?php
namespace App\Controller;

use App\Entity\Donation;
use App\Model\DonationModel;
use Core\Controller\DefaultController;

class DonationController extends DefaultController 
{
    private DonationModel $model;
    private MailController $mail;

    /**
     * Instancie les objets dont on a besoin dans toutes nos méthodes
     * 
     * @return void
     */
    public function __construct()
    {
        $this->model = new DonationModel;
        $this->mail = new MailController;
    }

    public function thxDon()
    {
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
        if (!empty($_POST) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['codePostal']) && isset($_POST['ville']) && isset($_POST['tel']) && isset($_POST['mail']) && isset($_POST['montant'])) {
            $donation= new Donation;
            $donation->setPrenom(htmlspecialchars($_POST['prenom']));
            $donation->setNom(htmlspecialchars($_POST['nom']));
            $donation->setAdresse(htmlspecialchars($_POST['adresse']));
            $donation->setCodePostal(htmlspecialchars($_POST['codePostal']));
            $donation->setVille(htmlspecialchars($_POST['ville']));
            $donation->setTel(strval(htmlspecialchars($_POST['tel'])));
            $donation->setMail(htmlspecialchars($_POST['mail']));
            $donation->setMontant(htmlspecialchars($_POST['montant']));

            var_dump($donation);
 
            $this->model->save($donation);
                
            header("Location: index.php?page=donFait");

            $this->mail->sendMail($_POST['mail'], 
                'Merci pour le don',
                '<h1>Bonjour '.$_POST['prenom'].'</h1><br/> 
                Nous avons recu votre don de '.$_POST['montant'].' euro(s) <br/> 
                <h3>merci de votre contribution, votre geste nous aide ennormement ! *_*</h3>' );

            exit();
        } else {
            $this->render("donation/index", [
                'donations' => $this->model->Somme()
            ]);
        }

    }
}