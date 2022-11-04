<?php

namespace Core\Routeur;

use App\Controller\HomeController;
use App\Controller\PostController;
use App\Controller\ErrorController;
use App\Controller\CategoryController;

class Routeur
{
    public static function routes()
    {
        try {
            if (isset($_GET['page']) && !empty($_GET['page'])) {
                switch ($_GET['page']) {
                    case 'animal':
                        (new UserController)->index();
                        break;
                    case 'infoanimal':
                        (new UserController)->info();
                        break;
                    case 'infoadoption':
                        (new UserController)->add();
                        break;
                    case 'produits':
                        (new ProduitController)->index();
                        break;
                    case 'infoproduits':
                        (new ProduitController)->info();
                        break;
                    case 'connexion':
                        (new UserController)->login();
                        break;
                    case 'inscription':
                        (new UserController)->register();
                        break;
                    case 'donations':
                        (new DonationController)->index();
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
