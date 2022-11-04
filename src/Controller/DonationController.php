<?php
namespace App\Controller;

class DonationController extends DefaultController {

    public function index()
    {
        $this->render('donation/index');
    }
}