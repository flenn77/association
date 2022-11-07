<?php
namespace App\Controller;

use Core\Controller\DefaultController;

/**
 * Controller permettant d'afficher la page d'accueil
 * 
 * @method void home() -> Renvoie l'utilisateur sur la page d'accueil
 */
final class HomeController extends DefaultController 
{
    /*************************
     * METHODES DE LA CLASSE *
     *************************/

     /**
      * Renvoie l'utilisateur sur la page d'accueil
      *
      * @return void
      */
    public function home()
    {
        // Affichage de la page 'page/home.php'
        $this->render('page/home');
    }
}