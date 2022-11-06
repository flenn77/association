<?php
namespace App\Controller;

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Core\Controller\DefaultController;

class MailController extends DefaultController
{
    private PHPMailer $mail;

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
            //Server settings
            $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $this->mail->isSMTP();                                            //Send using SMTP
            $this->mail->Host       = 'smtp.office365.com';                   //Set the SMTP server to send through
            $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this->mail->Username   = 'aazebre.assoc@outlook.fr';             //SMTP username
            $this->mail->Password   = 'mdp.D.M.W.Y';                          //SMTP password              
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption
            $this->mail->Port       = 587;  

            //Recipients
            $this->mail->setFrom('aazebre.assoc@outlook.fr');
            $this->mail->addAddress($address);     //Add a recipient

            //Content
            $this->mail->isHTML(true);                                  //Set email format to HTML
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;

            $this->mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}