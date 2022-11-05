<?php
namespace App\Controller;

use Core\Controller\DefaultController;

class ReservationController extends DefaultController
{
    public function index()
    {
        $this->render('reservation/index');
    }
}