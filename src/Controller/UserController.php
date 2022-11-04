<?php
namespace App\Controller;

use App\Model\UserModel;
use Core\Controller\DefaultController;

class UserController extends DefaultController{

    private UserModel $model;
    
    /**
     * Instancie les objets dont on a besoin dans toutes nos méthodes
     */
    public function __construct()
    {
        $this->model = new UserModel;
    }

    /**
     * Page affichant toutes nos catégories
     *
     * @return void
     */
    public function index()
    {
        // $categories = $this->model->findAll();
        // require_once ROOT."/templates/User/index.php";
        $this->render("user/index", [
            'users' => $this->model->findAll()
        ]);
    }

    public function login() {
        $this->render("user/login", [

        ]);
    }

    public function loginPost() {
        $this->render("user/login", [
            
        ]);
    }
    
}