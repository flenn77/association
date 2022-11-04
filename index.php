<?php

use App\Controller\AnimalController;
use App\Controller\UserController;
use App\Fixtures\AppFixtures;
use App\Manager\UserManager;
use App\Manager\PostManager;
use Core\Routeur\Routeur;

define("ROOT", __DIR__);
define("CSS", dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "css" . DIRECTORY_SEPARATOR);
require ROOT. "/vendor/autoload.php";

Routeur::routes();







