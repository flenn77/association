<?php
namespace App\Controller;

use Core\Controller\DefaultController;

final class HomeController extends DefaultController {

    public function home()
    {
        $this->render('page/home');
    }
}