<?php

use App\Controller\AnimalController;
use App\Controller\UserController;
use App\Fixtures\AppFixtures;
use App\Manager\UserManager;
use App\Manager\PostManager;

define("ROOT", __DIR__);
require ROOT. "/vendor/autoload.php";



if (isset($_GET['page']) && !empty($_GET['page'])){
    switch ($_GET['page']) {
        case 'users':
            (new UserController)->index();
            break;
        case 'animals':
            (new AnimalController)->index();
            break;
        case 'detail':
            (new AnimalController)->detail();
            break;
        default:
            (new UserController)->index();
            break;
    }
}





