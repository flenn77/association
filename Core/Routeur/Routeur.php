<?php

namespace Core\Routeur;

use App\Controller\UserController;

class Routeur
{
    public static function routes()
    {
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            switch ($_GET['page']) {
                case 'login':
                    (new UserController)->login();
                    break;
                case 'loginPost':
                    (new UserController)->loginPost();
                    break;
                case 'register':
                    (new UserController)->addUser();
                    break;
                // case 'register':
                //     (new UserController)->register();
                //     break;
            }
        } else {
            (new UserController)->index();
        }
    }
}
