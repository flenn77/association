<?php

namespace Core\Routeur;

use App\Controller\HomeController;
use App\Controller\UserController;
use App\Controller\ErrorController;
use App\Controller\AnimalController;
use App\Controller\ProduitController;
use App\Controller\DonationController;
use App\Controller\ReservationController;

class Routeur
{

    public static function pages()
    {
        try {
            if (isset($_GET['page']) && !empty($_GET['page'])) {
                switch ($_GET['page']) {
                    case 'animal':
                        (new AnimalController)->index();
                        break;
                    case 'infoanimal':
                        (new AnimalController)->info();
                        break;
                        // case 'infoadoption':
                        //     (new AnimalController)->add();
                        //     break;
                    case 'produit':
                        (new ProduitController)->index();
                        break;
                    case 'infoproduit':
                        (new ProduitController)->info();
                        break;
                    case 'user':
                        (new UserController)->index();
                        break;
                    case 'infouser':
                        (new UserController)->info();
                        break;
                    case 'connexion':
                        (new UserController)->login();
                        break;
                    case 'inscription':
                        (new UserController)->register();
                        break;
                    case 'donation':
                        (new DonationController)->register();
                        break;
                    case 'donFait':
                        (new DonationController)->login();
                        break;
                    case 'reservation':
                        (new ReservationController)->index();
                        break;

                    default:
                        (new ErrorController)->error404();
                        break;
                }
            } else {
                (new HomeController)->home();
            }
        } catch (\Exception $e) {
            (new ErrorController)->error($e);
        }
    }
}
