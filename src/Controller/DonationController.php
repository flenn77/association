<?php
namespace App\Controller;

use Core\Controller\DefaultController;

class DonationController extends DefaultController 
{
    public function index()
    {
        $this->render('donation/index');
    }
}