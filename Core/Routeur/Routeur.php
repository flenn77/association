<?php

namespace Core\Routeur;

use App\Controller\HomeController;
// use App\Controller\ProduitController;
use App\Controller\UserController;
use App\Controller\ErrorController;
use App\Controller\AnimalController;

class Routeur {

    public static function pages()
    {
        try {
            if (isset($_GET['page']) && !empty($_GET['page'])) {
                switch ($_GET['page']) {
                    case 'animal':
                        (new AnimalController)->index();
                        break;
                    case 'detailAnimal':
                         (new AnimalController)->show();
                        break;
                    case 'detail':
                        (new UserController)->show();
                        break;                    
                    case 'user':
                        (new UserController)->index();
                        break;
                    case 'connexion':
                        (new UserController)->login();
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
