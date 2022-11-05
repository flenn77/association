<?php
namespace App\Controller;

use App\Controller\MailController;
use Core\Controller\DefaultController;

final class HomeController extends DefaultController {

    private MailController $mail;

    public function __construct()
    {
        $this->mail = new MailController;
    }

    public function home()
    {
        $this->mail->sendMail();
        $this->render('page/home');
    }
}