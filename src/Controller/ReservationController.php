<?php
namespace App\Controller;

use Core\Controller\DefaultController;

/**
 * Controller permettant d'afficher la ou les pages concernant la reservation 
 * (affichage des reservations en cours, formaulaire de reservation, ...)
 * 
 * @method void index() -> Affiche le formulaire de reservation
 */
final class ReservationController extends DefaultController
{
    /**
     * Renvoie l'utilisateur sur la page du formulaire de réservation
     *
     * @return void
     */
    public function index()
    {
        // Affichage de la page 'reservation/index.php'
        $this->render('reservation/index');
    }
}