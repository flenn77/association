<?php

use Core\Routeur\Routeur;
use App\Controller\UserController;
use App\Controller\AnimalController;

define("ROOT", __DIR__);
define("CSS", dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "css" . DIRECTORY_SEPARATOR);
require ROOT. "/vendor/autoload.php";

(new Routeur)->pages();