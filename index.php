<?php

use App\Controller\AnimalController;
use App\Controller\UserController;
use App\Fixtures\AppFixtures;
use App\Manager\UserManager;
use App\Manager\PostManager;

define("ROOT", __DIR__);
require ROOT. "/vendor/autoload.php";

// Charge de fausses données en BDD pour les tests
// (new AppFixtures)->load();
// echo "Les fixtures sont chargées";

// Affiche notre page de catégories
// (new UserManager)->getCategories();
// (new PostManager)->getPosts();
(new AnimalController)->index();
// (new UserController)->show();






