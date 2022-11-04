<?php

use Core\Routeur\Routeur;
use App\Manager\PostManager;
use App\Manager\UserManager;
use App\Fixtures\AppFixtures;
use App\Controller\UserController;
use App\Controller\AnimalController;

define("ROOT", __DIR__);
require ROOT. "/vendor/autoload.php";
(new Routeur)->pages();


// if (isset($_GET['page']) && !empty($_GET['page'])){
//     switch ($_GET['page']) {
//         case 'users':
//             (new UserController)->index();
//             break;
//         case 'animals':
//             (new AnimalController)->index();
//             break;
//         case 'detail':
//             (new UserController)->show();
//             break;
//         case 'detailAnimal':
//             (new AnimalController)->show();
//             break;
//         default:
//             (new UserController)->index();
//             break;
//     }
    
// }else{
//     (new UserController)->index();
// }





