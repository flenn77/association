<?php
namespace App\Controller;

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Core\Controller\DefaultController;

/**
 * Controller permettant d'envoyer un mail
 * 
 * @method void sendMail() -> Permet l'envoi d'un mail à un utilisateur
 */
final class MailController extends DefaultController
{
    /***************************
     * PROPRIETES DE LA CLASSE *
     ***************************/

    private PHPMailer $mail;

    /*******************************************************************************************************************/



    /*************************
     * METHODES DE LA CLASSE *
     *************************/

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }

    /**
     * Permet l'envoi d'un mail à un utilisateur
     *
     * @param string $address : Addresse mail du destinataire
     * @param string $subject : Objet du mail
     * @param string $body : Corps du mail (en HTML)
     * @return void
     */
    public function sendMail(string $address, string $subject, string $body)
    {
        try {

            /**
             * Server settings
             */
            //$this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Génère des messages de debug
            $this->mail->isSMTP();                                            //Utilisation du protocole SMTP
            $this->mail->Host       = 'smtp.office365.com';                   //Serveur SMTP utilisé
            $this->mail->SMTPAuth   = true;                                   //Autorise l'authentification
            $this->mail->Username   = 'n.denisnn@outlook.fr';                 //Nom d'utilisateur du SMTP
            $this->mail->Password   = 'Onseretient11';                          //Mot de passe du SMTP              
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit STARTTLS encryption
            $this->mail->Port       = 587;                                    //Port du SMTP
            
            /**
             * Char-set
             */
            $this->mail->CharSet = "utf-8"; 

            /**
             * Expéditeur/Destinataire
             */
            $this->mail->setFrom('n.denisnn@outlook.fr');
            $this->mail->addAddress($address);     //Ajoute un destinataire

            /**
             * Contenu du mail
             */
            $this->mail->isHTML(true);            //Autorise l'utilisation et le traitement des balises HTML
            $this->mail->Subject = $subject;      //Objet du mail
            $this->mail->Body    = $body;         //Contenu du mail

            $this->mail->send();    //Envoi du mail
            //echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}